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
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->image = yiiwebUploadedFile::getInstance($model, 'image');

            if ($model->validate()) {
                $saveTo = 'uploads/' . $model->image->baseName . '.' . $model->image->extension;
                if ($model->image->saveAs($saveTo)) {
                    $model->save(false);
                    Yii::$app->session->setFlash('success', 'Sampul berhasil disimpan');
                } else {
                    Yii::$app->session->setFlash('error', 'Data gagal disimpan');
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

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->image = yiiwebUploadedFile::getInstance($model, 'image');

            if ($model->validate()) {
                $saveTo = 'uploads/' . $model->image->baseName . '.' . $model->image->extension;
                if ($model->image->saveAs($saveTo)) {
                    $model->save(false);
                    Yii::$app->session->setFlash('success', 'image berhasil disimpan');
                } else {
                    Yii::$app->session->setFlash('error', 'Data gagal disimpan');
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
 
public function actionExcel()
 
{
 
$spreadsheet = new PhpSpreadsheet\Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();
 
//Menggunakan Model
 
$database =\common\models\RefJafung::find()
->select('kode_jafung,jenis_jafung')
->all();
 
//JIka menggunakan DAO , gunakan QueryAll()
 
/*
 
$sql = "select kode_jafung,jenis_jafung from ref_jafung"
 
$database = Yii::$app->db->createCommand($sql)->queryAll();
 
*/
 
$database = \yii\helpers\ArrayHelper::toArray($database);
$worksheet->fromArray($database, null, 'A4');
 
$writer = new Xlsx($spreadsheet);
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="download.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
 
}

}
