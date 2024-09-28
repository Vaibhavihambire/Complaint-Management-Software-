<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Engdetails $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="engdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= 
    // $form->field($model, 'work')->textInput(['maxlength' => true]) 
    $form->field($model, 'work')->dropDownList([
        'IT' => 'IT',
        'Electronic' => 'Electronic',
        'Electrician' => 'Electrician',
        'Civil' => 'Civil',
    ], ['prompt' => 'Select Work']) 
    ?>
    

    <?= $form->field($model, 'phoneNo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
