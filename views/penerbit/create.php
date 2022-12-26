<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penerbit $model */

$this->title = 'Create Penerbit';
$this->params['breadcrumbs'][] = ['label' => 'Penerbits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
