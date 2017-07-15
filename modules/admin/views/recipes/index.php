<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RecipesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Всі рецепти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-index">

    <h1>Список всіх рецептів:</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавити рецепт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                },
            ],
            'name',
            //'short_content:ntext',
            //'content:ntext',
            // 'data',
            // 'is_popul',
            // 'status',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->status ? '<span class="text-success">Активний</span>' : '<span class="text-danger">Не активний</span>';
                },
                        'format' => 'html',
            ],
            // 'image',
            // 'keywords',
            // 'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
