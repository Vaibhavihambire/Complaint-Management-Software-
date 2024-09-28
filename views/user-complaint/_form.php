<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserComplaint $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-complaint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NameOfEmployee')->textInput(['maxlength' => true, 'value' => Yii::$app->user->identity->username]) ?>

    <?= $form->field($model, 'EmailOfEmployee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BlockNo')->textInput() ?>

    <?= 
    // $form->field($model, 'ComplaintCategory')->textInput(['maxlength' => true])
    // $form->field($model,'ComplaintCategory')->dropDownList(
    //     \yii\helpers\ArrayHelper::map(\app\models\engdetails::find()->all(),'work','work'),
    //     ['prompt'=>'Select Complaint Category','id'=> 'category-dropdown','class' => 'form-control']
    // )
    $form->field($model, 'ComplaintCategory')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\engdetails::find()->all(), 'work', 'work'),
        ['prompt' => 'Select Complaint Category', 'id' => 'category-dropdown', 'class' => 'form-control']
    )
    ?>

    <?= 
    // $form->field($model, 'EngineerAssigned')->textInput(['maxlength' => true])
    $form->field($model,'EngineerAssigned')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\engdetails::find()->select('name')->distinct()->all(),'name','name'),
        ['prompt'=>'Select Engineer','id'=> 'engineer-dropdown','class' => 'form-control']
    ) ?>

    <?= $form->field($model, 'DateOfIncident')->textInput() ?>

    <?= $form->field($model, 'SubjectForComplaint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<?php
$script = <<< JS
    $('#engineer-dropdown-btn').on('click',function(e) {
        var selectedEngineer = $('#engineer-dropdown').val();  
        if (selectedEngineer !== '') {
                $.ajax({
                    url: 'retrieve-data.php', // Replace with the server-side script URL
                    method: 'POST',
                    data: { selectedEngineer: selectedEngineer },
                    success: function(response) {
                        // Update the autofill-data div with the retrieved data
                        console.log(response);
                        $('#name-field').html(response);
                    }
                });
            }

    });
    //     $('#category-dropdown').on('change', function (e) {
    //     var selectedCategory = $(this).val();
        
    //     if (selectedCategory !== '') {
    //         $.ajax({
    //             url: 'retrieve-data.php', // Replace with the server-side script URL
    //             method: 'POST',
    //             data: { selectedCategory: selectedCategory },
    //             success: function (response) {
    //                 // Update the engineer-list div with the retrieved data
    //                 $('#engineer-list').html(response);
    //             }
    //         });
    //     }
    // });
    
JS;
$this->registerJS($script);
?>