<?php

namespace app\controllers;

use app\models\Buku;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\BukuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use yii\web\UploadedFile;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Buku models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Buku();
        $namaPenulis = Penulis::getAllPenulis();
        $namaPenerbit = Penerbit::getAllPenerbit();
        $namaKategori = Kategori::getAllKategori();

        if (Buku::$app->request->post()) {
            $model->load(Buku::$app->request->post());
            $model->image = yiiwebUploadedFile::getInstance($model, 'image');

            if ($model->validate()) {
                $saveTo = 'uploads/' . $model->image->baseName . '.' . $model->image->extension;
                if ($model->image->saveAs($saveTo)) {
                    $model->save(false);
                    Buku::$app->session->setFlash('success', 'Sampul berhasil disimpan');
                } else {
                    Buku::$app->session->setFlash('error', 'Data gagal disimpan');
                }
            }
            return $this->refresh();
        } else {
            return $this->render('create', [
                'model' => $model,
                'namaPenulis' => $namaPenulis,
                'namaPenerbit' => $namaPenerbit,        
                'namaKategori' => $namaKategori,
            ]);
        }
    }


    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)

    {
        $model = Buku::findOne($id);
        $namaPenulis = Penulis::getAllPenulis();
        $namaPenerbit = Penerbit::getAllPenerbit();
        $namaKategori = Kategori::getAllKategori();

        if (Buku::$app->request->post()) {
            $model->load(Buku::$app->request->post());
            $model->image = yiiwebUploadedFile::getInstance($model, 'image');

            if ($model->validate()) {
                $saveTo = 'uploads/' . $model->image->baseName . '.' . $model->image->extension;
                if ($model->image->saveAs($saveTo)) {
                    $model->save(false);
                    Buku::$app->session->setFlash('success', 'image berhasil disimpan');
                } else {
                    Buku::$app->session->setFlash('error', 'Data gagal disimpan');
                }
            }
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'namaPenulis' => $namaPenulis,
                'namaPenerbit' => $namaPenerbit,
                'namaKategori' => $namaKategori,
            ]);
        }
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
     {
        $model = Buku::findOne($id);
        $filepath=Yii::getAlias('@app') . '/uploads/' . $model->image;
        if (is_file($filepath))
        {
           unlink($filepath);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport() {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_reportView');
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Perpustakaan'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

     public function actionExportexcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(10); // mengatur lebar kolom
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);

        $sheet->mergeCells('A2:E2'); // merger blok a2 sampe e2
        $sheet->setCellValue('A2','Daftar Buku');
        $sheet->getStyle('A2:F2')->getFont()->setBold(true); // mengatur fontstyle bold dari yang d merge
        $sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // mengatur ke tengah text nya

        $sheet->getStyle('A4:F4')->getFont()->setBold(true);
        $sheet->getStyle('A4:E4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('A4','No');
        $sheet->setCellValue('B4','nama');
        $sheet->setCellValue('C4','tahun_terbit');
        $sheet->setCellValue('D4','id_penulis');
        $sheet->setCellValue('E4','id_penerbit');
        $sheet->setCellValue('F4','id_kategori');

        $row = 4;
        $i = 1;

        $models = new Buku();
//       $searchModel = new BukuSearch();

        foreach ($models->find()->all() as $data) {
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $sheet->setCellValue('B' . $row, $data->nama);
            $sheet->setCellValue('C' . $row, $data->tahun_terbit);
            $sheet->setCellValue('D' . $row, $data->penulis->nama);
            $sheet->setCellValue('E' . $row, $data->penerbit->nama);
            $sheet->setCellValue('F' . $row, $data->kategori->nama);

            $i++;
        }
        $filename = "DataBukuBaru - ".date("Y-m-d-H-i-s").".xlsx";
        $path = 'exports/' . $filename;
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        return $this->redirect($path);
    }
}
