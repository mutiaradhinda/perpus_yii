<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kategori $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-form">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori</h3>
              </div>
              <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

     </div>
    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</section>
</div>

