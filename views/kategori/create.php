<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kategori $model */

$this->title = 'Create Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">
    s
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
