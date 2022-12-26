<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = 'Create Buku';
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-create">

    <?= $this->render('_form', [
        'model' => $model,
        'namaPenulis' => $namaPenulis,
        'namaPenerbit' => $namaPenerbit,
        'namaKategori' => $namaKategori,
    ]) ?>

</div>
