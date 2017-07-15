<?php

use yii\helpers\Url;
use app\components\BuyWidget;
?>
<section class="content">
    
    <?php if(!Yii::$app->user->isGuest) :?>
    <span class="glyphicon glyphicon-pencil pull-right"><a href="<?= Url::to(['/admin/buy/update?id=1']) ?>">Редагувати</a></span>
    <?php endif;?>
    
    <h1>Замовити торт м.Хотин:</h1>
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
    <div>
          <?= BuyWidget::widget(['tpl' => 'buy']) ?>
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
    </div>                                 
</section>