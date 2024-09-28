<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserComplaint $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Complaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>

    <style>
        /* Custom CSS styles */
        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        @media print {
            /* Print-specific styles */
            .hide-on-print {
                display: none;
            }
            
            .page-break {
                page-break-before: always;
            }
            
            /* Adjust margins */
            @page {
                margin: 1cm;
            }
            }

    </style>
</head>
<body>
<div class="user-complaint-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?= ($model->sent2eng != '1' && !Yii::$app->user->can("is-eng")) ?  Html::a('Update', ['update', 'id' => $model->id,'reEditing' => 0], ['class' => 'btn btn-primary']) : '' ?>
        <?= ($model->sent2eng != '1' && !Yii::$app->user->can("is-eng")) ?  Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : '' ?>
       
    </p>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'NameOfEmployee',
            'EmailOfEmployee:email',
            'Department',
            'BlockNo',
            'ComplaintCategory',
            'EngineerAssigned',
            'DateOfIncident',
            'SubjectForComplaint',
            'Description:ntext',
            'status',
            // 'sent2eng',
            // 'created_by',
        ],
    ]) ?>

<p>
    <?= (Yii::$app->user->can("is-eng")) ?  Html::a('Complete', ['comp', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    <?= (Yii::$app->user->can("is-eng")) ?  Html::a('Reject', ['pend', 'id' => $model->id], ['class' => 'btn btn-danger']) : '' ?>
    <?= (Yii::$app->user->can("is-eng")) ?  Html::a('View', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) : '' ?>
</p>

    <p>
    <?= (Yii::$app->user->can("create-complaint") &&($passed === 0)) ?  Html::a('Send to eng', ['sent', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <p>
    <?=(Yii::$app->user->can("create-complaint") &&($passed === 1)) ? 'This Complaint is already passed, if there are any changes you can click below.' : '' ?></br>
    <?= (Yii::$app->user->can("create-complaint") &&($passed === 1) && !Yii::$app->user->can("is-eng")) ?  Html::a('Update', ['update', 'id' => $model->id,'reEditing' => 1], ['class' => 'btn btn-primary']) : '' ?>
    </p>

   

</div>
</body>
</html>
