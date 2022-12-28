<?php

use app\models\Peminjaman;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PeminjamanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Buku</h2>
              </div>
              <div class="card-body">

    <p>
        <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Judul Buku',
                'attribute' => 'buku.nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Anggota',
                'attribute' => 'anggota',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Tanggal Pinjam',
                'attribute' => 'tanggal_pinjam',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Tanggal Kembali',
                'attribute' => 'tanggal_kembali',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Denda',
                'attribute' => 'denda',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Status',
                'attribute' => 'status',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Peminjaman $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    </div>
    <?php Pjax::end(); ?>

</div>
</div>
</div>
</div>
</section>
</div>
