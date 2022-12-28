<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */

$this->title = 'Update Peminjaman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'namaBuku' => $namaBuku,
    ]) ?>

</div>
