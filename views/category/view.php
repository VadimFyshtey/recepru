<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<section class="content">
    <h1><?= $category['name'] ?>:</h1>
    <div>
        <?php if(!empty($recipes)): ?>
        <?php $count = count($recipes); $i = 0; foreach ($recipes as $recipe): ?>
        <?php $mainImage = $recipe->getImage(); ?>
        <p class="recipeName"><a href="<?= Url::to(['recipe/view', 'id' => $recipe['id']]) ?>"><?= $recipe['name'] ?></a></p>
        <?= Html::img($mainImage->getUrl(), ['class' => 'receptImg', 'alt' => $recipe['name'], 'width' => '250px', 'height' => '250px']) ?>
        <p><?= $recipe['short_content'] ?></p>
        <br />
        <br />
        <br />
        <br />
        <br />
                                 
        <p>Дата публікації: <?= $recipe['data'] ?></p>
        &nbsp;<i class="glyphicon glyphicon-eye-open"></i> Перегляди: <?= $recipe['view'] ?>
        <p class="detal"><a href="<?= Url::to(['recipe/view', 'id' => $recipe['id']]) ?>">Детальніше</a></p>
        <br /> <br />
        <hr>
        
        <div class="clearfix"></div>
        
           <?php if($i % 2 == 0): ?>
        <div><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Тест -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2586863288185463"
     data-ad-slot="1986069835"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
         <?php endif; ?> 
         <?php $i++; if($i % 2 == 0 || $i == $count ): ?>	
	</div>
        <?php endif; ?>  
        
        <?php endforeach; ?>
        <div align="center">
             <?php 
            echo LinkPager::widget([
            'pagination' => $pages,
            ]);
            ?>
        </div>
        <?php else: ?>
        <hr>
        <h2 align="center">Категорія пуста</h2>
        <?php endif; ?>
    </div>                                 
</section>