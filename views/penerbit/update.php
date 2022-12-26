<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penerbit $model */

$this->title = 'Update Penerbit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penerbits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penerbit-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
