<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */

$this->title = 'comppend Voucherwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'user-complaint', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'comppend';
?>
<div class="user-complaint-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Yii::$app->session->setFlash('success', 'Complaint sent.'); ?>
    <?php 
        
    // Yii::$app->getResponse()->redirect(['voucherwork']); ?>

</div>