<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="content">
    <h1 class="recipeName">Залиште свій відгук</h1>
    <br />
    <div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Тест -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2586863288185463"
     data-ad-slot="1986069835"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
        <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success');?>
        </div>
        <?php endif; ?>
    <div>
       <center>
        <?php $form = ActiveForm::begin(['action' => ['reviews/comment'], 
             'options' => ['class' => ' contact-form', 'role' => 'form']]); ?>

         <?= $form->field($reviewForm, Html::encode('name'))->textInput() ?>
         <?= $form->field($reviewForm, Html::encode('content'))->textarea(['rows' => 6])?>
           <?= $form->field($reviewForm, 'captcha')->widget(\yii\captcha\Captcha::classname(), [
             // configure additional widget properties here
            ]) ?>
        <div class="form-group">
            <?= Html::submitButton('Добавити', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <br />
         <?php ActiveForm::end(); ?>
                
       </center>
        
        <hr>
        
      <?php if(!empty($reviews)): ?>
        
       <h2 align="center">Відгуки:</h2>
        <?php foreach ($reviews as $review): ?>
            <div >
            <div class="comments">
            <p><b>Ім'я: <?= $review['name'] ?></b></p>
            <p><i>Дата: <?= $review['data'] ?></i></p>
            </div>
                <p class="comm"><?= $review['content'] ?></p>
            
            </div>
        <hr>
        <?php endforeach;?>
        
      <?php endif;?>
        
         <?php if(empty($reviews)) echo "<center><h3>Ваш відгук буде перший.</center></h3>";?>
    </div>                                 
</section>

