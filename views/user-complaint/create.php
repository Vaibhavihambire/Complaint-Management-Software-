<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserComplaint $model */

$this->title = 'Create User Complaint';
$this->params['breadcrumbs'][] = ['label' => 'User Complaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-complaint-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
