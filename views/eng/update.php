<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Engdetails $model */

$this->title = 'Update Engdetails: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Engdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="engdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
