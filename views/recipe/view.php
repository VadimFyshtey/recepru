<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<section class="content">
    <h1 class="recipeName"><?= $recipe['name'] ?></h1>
    <div>
         
        <br /> <br />   
       <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success');?>
        </div>
        <?php endif; ?>
        <center><?= Html::img($mainImage->getUrl(), ['class' => 'OneReceptImg', 'alt' => $recipe['name']]) ?></center>
        <p><?= $recipe['content'] ?></p>
        
        <br />
           <hr>
        <p class="ViewDownText">Категорія: <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $recipe['category']['id']]) ?>"><?= $recipe['category']['name'] ?></a></p>
        <p class="ViewDownText">Дата публікації: <?= $recipe['data'] ?></p>
        &nbsp;<i class="glyphicon glyphicon-eye-open"></i> Перегляди: <?= $recipe['view'] ?>

        
        <br /> 
        <br /> 
        <div><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Тест -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2586863288185463"
     data-ad-slot="1986069835"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
        <?php if(!Yii::$app->user->isGuest) :?>
        <span class="glyphicon glyphicon-pencil pull-right"><a href="<?= Url::to(['/admin/recipes/update/', 'id' => $recipe['id']]) ?>">Редагувати</a></span>
        <?php endif;?>
        <br />
        <hr>
        
            <center>
        <?php $form = ActiveForm::begin(['action' => ['recipe/comment', 'id' => $recipe['id']], 
             'options' => ['class' => ' contact-form', 'role' => 'form']]); ?>
         
      
        
         <?= $form->field($commentsForm, Html::encode('name'))->textInput() ?>
         <?= $form->field($commentsForm, Html::encode('comment'))->textarea(['rows' => 6])?>
         <?= $form->field($commentsForm, 'captcha')->widget(\yii\captcha\Captcha::classname(), [
             // configure additional widget properties here
            ]) ?>
        <div class="form-group">
            <?= Html::submitButton('Добавити', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <br />
         <?php ActiveForm::end(); ?>
                
            </center>
        
        <hr>
        
      <?php if(!empty($comments)): ?>
        
       <h2 align="center">Коментарії:</h2>
        <?php foreach ($comments as $com): ?>
            <div >
            <div class="comments">
            <p><b>Ім'я: <?= $com->name ?></b></p>
            <p><i>Дата: <?= $com->data ?></i></p>
            </div>
            <p class="comm"><?= $com->comment ?></p>
            
            </div>
        <hr>
        <?php endforeach;?>
        
      <?php endif;?>
        
         <?php if(empty($comments)) echo "<center><h3>Ваш коментарій буде перший.</center></h3>";?>
    </div>                                 
</section>

