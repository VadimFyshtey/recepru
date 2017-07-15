<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Recipes */

$this->title = 'Створити новий рецепт';
$this->params['breadcrumbs'][] = ['label' => 'Всі рецепти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-create">

    <h1>Створити новий рецепт</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
