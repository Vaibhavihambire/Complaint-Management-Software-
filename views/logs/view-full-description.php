<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Action Description', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode('Action details') ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'byUserId',
            'byUserName',
            [
                'attribute'=>'description',
                'format' => 'raw',
            ], 
            [
                'attribute' => 'time', // Assuming 'time' is the name of your timestamp column
                'format' => 'datetime', // Use the 'datetime' format,
            ],
        ],
    ]) ?>

</div>
