<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penulis $model */

$this->title = 'Create Penulis';
$this->params['breadcrumbs'][] = ['label' => 'Penulis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
