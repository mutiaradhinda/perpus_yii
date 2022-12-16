<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kategori $model */

$this->title = 'Update Kategori: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
