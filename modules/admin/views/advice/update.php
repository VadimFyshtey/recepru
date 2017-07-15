<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advice */

$this->title = 'Цікаві поради';
$this->params['breadcrumbs'][] = ['label' => 'Поради', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновлення';
?>
<div class="advice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
