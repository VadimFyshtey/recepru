<?php

use yii\helpers\Url;
use app\components\AdviceWidget
?>
<section class="content">
    
    <?php if(!Yii::$app->user->isGuest) :?>
    <span class="glyphicon glyphicon-pencil pull-right"><a href="<?= Url::to(['/admin/advice/update?id=1']) ?>">Редагувати</a></span>
    <?php endif;?>
    
    <h1>Поради на кухні, для гарної господині:</h1>
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
        
        <?= AdviceWidget::widget(['tpl' => 'advice']) ?>
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