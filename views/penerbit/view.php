<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Penerbit $model */

$this->title = 'Penerbit';
$this->params['breadcrumbs'][] = ['label' => 'Penerbits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penerbit-view">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Penerbit</h2>
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
                'label' => 'Penerbit',
                'attribute' => 'nama',
            ],
            [
                'label' => 'Alamat',
                'attribute' => 'alamat',
            ],
            [
                'label' => 'Telepon',
                'attribute' => 'telepon',
            ],
            
            'email:email',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>
</div>
