<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserComplaint $model */

$this->title = 'Update User Complaint: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Complaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-complaint-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
