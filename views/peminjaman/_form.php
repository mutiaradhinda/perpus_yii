<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peminjaman-form">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Peminjaman</h3>
              </div>
              <div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_buku')->widget(Select2::classname(),[
      'data' => $namaBuku,
      'options' => ['placeholder' => 'Pilih Buku..'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pinjam')->textInput() ?>

    <?= $form->field($model, 'tanggal_kembali')->textInput() ?>

    <?= $form->field($model, 'denda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-secondary']) ?>
    </div>

    </div>
    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</section>
</div>