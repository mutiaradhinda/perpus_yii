<?php

use app\models\Buku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\BukuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">
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
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Export PDF', ['report'], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
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
                'attribute' => 'nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Tahun Terbit',
                'attribute' => 'tahun_terbit',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Penulis',
                'attribute' => 'penulis.nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Penerbit',
                'attribute' => 'penerbit.nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Kategori',
                'attribute' => 'kategori.kategori',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Sampul',
                'attribute' => 'image',
                'headerOptions' => ['class'=>'text-center'],
            ],
           
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Buku $model, $key, $index, $column) {
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
