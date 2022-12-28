<?php

use app\models\Penulis;
use app\models\Buku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PenulisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penulis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-index">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Penulis</h2>
              </div>
              <div class="card-body">

    <p>
        <?= Html::a('Create Penulis', ['create'], ['class' => 'btn btn-secondary']) ?>
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
                'header' => 'Nama Penulis',
                'attribute' => 'nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Alamat',
                'attribute' => 'alamat',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Telepon',
                'attribute' => 'telepon',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Email',
                'attribute' => 'email',
                'headerOptions' => ['class'=>'text-center'],
            ],

            [
                'header' => 'Jumlah Buku',
                // 'class' => Buku::getJumlahBuku(),
                'headerOptions' => ['class'=>'text-center'],
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penulis $model, $key, $index, $column) {
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