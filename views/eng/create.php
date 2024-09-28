<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Engdetails $model */

$this->title = 'Create Engdetails';
$this->params['breadcrumbs'][] = ['label' => 'Engdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engdetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
