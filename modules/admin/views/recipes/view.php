<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Recipes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Всі рецепти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-view">
<?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo Yii::$app->session->getFlash('success');?>
    </div>
<?php endif; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви дійсно хочете видалити данний рецепт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' =>  $model->category->name,
                
            ],
            'name',
            'short_content:ntext',
            'content:ntext',
            'data',
            //'is_popul',
            [
                'attribute' => 'is_popul',
                'value' => $model->is_popul ? '<span class="text-success">Популярний</span>' : '<span class="text-danger">Не популярний</span>',
                'format' => 'html',
          
            ],
            //'status',
            [
                'attribute' => 'status',
                'value' => $model->status ? '<span class="text-success">Активний</span>' : '<span class="text-danger">Не активний</span>',
                'format' => 'html',
          
            ],
            //'image',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl()}' />",
                'format' => 'html',
            ],
            'keywords',
            'description',
        ],
    ]) ?>

</div>
