<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Publisher $model */

$this->title = 'Update Publisher: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publisher-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
