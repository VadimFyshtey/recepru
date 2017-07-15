<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Відгукі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1>Список всіх відгуків:</h1>

    <?php if(!empty($reviews)):?>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Автор</td>
                <td>Відгук</td>
                <td>Дія</td>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?= $review->id ?></td>
                <td><?= $review->name ?></td>
                <td><?= $review->content ?></td>
                <td>
                    <?php if($review->isAllowed()): ?>
                         <a class="btn btn-warning" href="<?= Url::toRoute(['reviews/disallow', 'id' => $review->id]); ?>">Заборонити</a>
                        <?php else: ?>
                        <a class="btn btn-success" href="<?= Url::toRoute(['reviews/allow', 'id' => $review->id]); ?>">Дозволити</a>
                    <?php endif;?>
                    <a class="btn btn-danger" href="<?= Url::toRoute(['reviews/delete', 'id' => $review->id]); ?>">Видалити</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>
    
</div>
