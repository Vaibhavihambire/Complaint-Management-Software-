<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserComplaintSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-complaint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'NameOfEmployee') ?>

    <?= $form->field($model, 'EmailOfEmployee') ?>

    <?= $form->field($model, 'Department') ?>

    <?php echo $form->field($model, 'BlockNo') ?>

    <?php echo $form->field($model, 'ComplaintCategory') ?>

    <?php echo $form->field($model, 'EngineerAssigned') ?>

    <?php echo $form->field($model, 'DateOfIncident') ?>

    <?php echo $form->field($model, 'SubjectForComplaint') ?>

    <?php echo $form->field($model, 'Description') ?>

    <?php echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
