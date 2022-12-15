<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Publisher $model */

$this->title = 'Create Publisher';
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publisher-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
