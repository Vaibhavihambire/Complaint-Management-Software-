<?php

use app\models\UserComplaint;
use app\controllers\UserComplaintController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserComplaintSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Complaints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-complaint-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= 
        // Html::a('Create User Complaint', ['create'], ['class' => 'btn btn-success']) 
        (!Yii::$app->user->can("is-eng") ) ? Html::a('Create Complaint', ['create'], ['class' => 'btn btn-success']) : '' 
        ?>
    </p>

    <div style="text-align: right;">
    <?php
        //  $showAllComplaints = Yii::$app->session->get('showAllComplaints', false);

        //  if ($showAllComplaints) {
        //     echo (!Yii::$app->user->can("create-complaint")) ? Html::a('Show All Complaints', ['usercomplaint/showall'], ['class' => 'btn btn-primary']) : "";
        //  } else {
        //      echo (!Yii::$app->user->can("create-complaint")) ? Html::a('Show My Complaints', ['usercomplaint/showall', 'showAll' => true], ['class' => 'btn btn-primary']) : "";
        //  }
        ?>
        </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            //'sent2eng',
            //'created_by',
            [
                'class' => ActionColumn::className(),
                'template' =>'{view}{update}{delete}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return $model->sent2eng != '1';
                    },
                    'delete' => function ($model) {
                        return $model->sent2eng != '1';
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
