<?php

use yii\i18n\Formatter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Audit Logs';
$this->params['breadcrumbs'][] = $this->title;
// print_r($model[0]->sent2AOA);
// die();
?>
<div class="voucherwork-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width: 30px'], // Set the width of the "#" column header
                // 'contentOptions' => ['style' => 'white-space: nowrap'], // Optional: Prevent line break in the content
            ],
            // // 'id',
            // 'byUserId',
            // 'byUserName',
            // 'description',
            [
                'attribute' => 'byUserId', // Assuming 'time' is the name of your timestamp column
                'headerOptions' => ['style' => 'width: 50px'],
            ],
            [
                'attribute' => 'byUserName', // Assuming 'time' is the name of your timestamp column
                'headerOptions' => ['style' => 'width: 100px'],
            ],
            [
                'attribute' => 'description', // Assuming 'time' is the name of your timestamp column
                'headerOptions' => ['style' => 'width: 300px'],
                'format' => 'raw', // Render the column as raw HTML
                'value' => function ($model) {
                    // Check if the description length is greater than 50 characters
                    $firstLine = strtok($model->description, ". ");
                    if (strlen($model->description) > 50) {
                        // Display a link to view the full description
                       // Extract the first line of the description
                        $firstLine = substr($model->description, 0, strpos($model->description, ". "));
                        // Display a link to view the full description with the first line as the link text
                        return  $firstLine . ' ' . Html::a('Details', ['view-full-description', 'id' => $model->id]);
                    } else {
                        // If description length is 50 characters or less, display the description directly
                        return $model->description;
                    }
                },
                'filter' => Html::activeTextInput($searchModel, 'description', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'time', // Assuming 'time' is the name of your timestamp column
                'format' => 'datetime', // Use the 'datetime' format
                'headerOptions' => ['style' => 'width: 180px'],
            ],
            
            // [
            //     'class' => ActionColumn::class,
                
            //     'template' => (Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier"))?'{view}':'{view}{update}{delete}',
            //     // 'template' => '',function (Voucherwork $model) {
            //     //     // $sent = VoucherworkController::getSent(['id' => $model->id]);
            //     //         $sent = $model->sent2AOA;
            //     //     return ($sent == '1' || Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier"))?'{view}':'{view}{update}{delete}';
                    
            //     // },
                    
            //     'urlCreator' => function ($action, Voucherwork $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //     }
            // ],
            // [
            //     'class' => ActionColumn::class,
            //     'template' => (($this->sent2AOA=='1')||Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier")) ? '{view}' : '{view}{update}{delete}',
            //     // 'template' => Yii::$app->user->can("is-cashier") ? '{view}' : '{view}{update}{delete}',
            //     'urlCreator' => function ($action, Voucherwork $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
            
        ],
    ]); ?>


</div>
