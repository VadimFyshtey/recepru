<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Buy */

$this->title = 'Замовити торт';
$this->params['breadcrumbs'][] = ['label' => 'Замовити торт', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Огляд';
?>
<div class="buy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'content:ntext',
        ],
    ]) ?>

</div>
