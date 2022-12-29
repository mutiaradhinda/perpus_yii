<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="buku-form">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Buku</h3>
              </div>
              <div class="card-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_terbit')->textInput() ?>

    <?= $form->field($model, 'id_penulis')->widget(Select2::classname(),[
      'data' => $namaPenulis,
      'options' => ['placeholder' => 'Pilih Penulis..'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'id_penerbit')->widget(Select2::classname(),[
      'data' => $namaPenerbit,
      'options' => ['placeholder' => 'Pilih Penerbit..'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'id_kategori')->widget(Select2::classname(),[
      'data' => $namaKategori,
      'options' => ['placeholder' => 'Pilih Kategori..'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

   </div>
    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</section>
</div>