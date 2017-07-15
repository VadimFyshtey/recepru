<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?  : 'Обновити', ['class' => $model->isNewRecord ?  : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
