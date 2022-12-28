<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */

$this->title = 'Create Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create">

    <?= $this->render('_form', [
        'model' => $model,
        'namaBuku' => $namaBuku,
    ]) ?>

</div>
