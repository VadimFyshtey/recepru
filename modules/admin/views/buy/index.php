<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Замовити торт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'content:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
