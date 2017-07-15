<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
   
    <?php echo $form->field($model, 'category_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\modules\admin\models\Category::find()->all(), 'id', 'name')) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?php 
        echo $form->field($model, 'short_content')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
        ]);
    ?>

   <?php 
        echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'php:Y/m/d',
]) ?>

    <?= $form->field($model, 'is_popul')->checkbox([ '0', '1' ]) ?>

    <?= $form->field($model, 'status')->checkbox([ '0', '1']) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Обновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
