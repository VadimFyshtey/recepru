<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Коментарії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1>Список всіх коментаріїв:</h1>

    <?php if(!empty($comments)):?>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Id рецепта</td>
                <td>Автор</td>
                <td>Коментарій</td>
                <td>Дія</td>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $comment->id ?></td>
                <td><?= $comment->recipe_id ?></td>
                <td><?= $comment->name ?></td>
                <td><?= $comment->comment ?></td>
                <td>
                    <?php if($comment->isAllowed()): ?>
                         <a class="btn btn-warning" href="<?= Url::toRoute(['comment/disallow', 'id' => $comment->id]); ?>">Заборонити</a>
                        <?php else: ?>
                        <a class="btn btn-success" href="<?= Url::toRoute(['comment/allow', 'id' => $comment->id]); ?>">Дозволити</a>
                    <?php endif;?>
                    <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Видалити</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>
    
</div>
