<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="buku-view">
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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Judul Buku',
                'attribute' => 'nama',
            ],
            [
                'label' => 'Tahun Terbit',
                'attribute' => 'tahun_terbit',
            ],
            [
                'label' => 'Penulis',
                'attribute' => 'penulis.nama',
            ],
            [
                'label' => 'Penerbit',
                'attribute' => 'penerbit.nama',
            ],
            [
                'label' => 'Kategori',
                'attribute' => 'kategori.kategori',
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Sampul',
                'format' => 'raw',
                'value' => function($data){
                    return "<img width='104px' src='".Url::to(['perpus-yii/view-image','nama'=>$data->image])."'>";
                }
            ],
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>
</div>
