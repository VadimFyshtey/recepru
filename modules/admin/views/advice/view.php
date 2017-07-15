<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advice */

$this->title = 'Цікаві поради';
$this->params['breadcrumbs'][] = ['label' => 'Поради', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advice-view">

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
