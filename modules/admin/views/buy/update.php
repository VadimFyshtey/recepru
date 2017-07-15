<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Buy */

$this->title = 'Замовити торт: ';
$this->params['breadcrumbs'][] = ['label' => 'Замовити торт', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновлення';
?>
<div class="buy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
