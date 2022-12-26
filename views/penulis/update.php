<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penulis $model */

$this->title = 'Update Penulis: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penulis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penulis-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
