<?php

use app\models\Kategori;
use app\models\Buku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\KategoriSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Kategori</h2>
              </div>
              <div class="card-body">

    <p>
        <?= Html::a('Create Kategori', ['create'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Export PDF', ['report'], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
        <?= Html::a('<i class="fa fa-file-excel"></i> Export Excel', ['exportexcel'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Kategori',
                'attribute' => 'kategori',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'class' =>'yii\grid\DataColumn',
                'attribute' => 'Jumlah Buku',
                'value' =>'KategoriCount',
            ],
           
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kategori $model, $key, $index, $column) {
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
