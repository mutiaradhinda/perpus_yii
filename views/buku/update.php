<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = 'Update Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buku-update">

    <?= $this->render('_form', [
        'model' => $model,
        'namaPenulis' => $namaPenulis,
        'namaPenerbit' => $namaPenerbit,
        'namaKategori' => $namaKategori,
    ]) ?>

</div>
