<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\LtAppAsset;
use app\assets\AppAsset;
use app\components\MenuWidget;
use app\components\PopulWidget;
use yii\helpers\Url;

LtAppAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2586863288185463",
    enable_page_level_ads: true
    });
    </script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
   
    
    <link rel="shortcut icon" href="/images/icon.png" type="image/png" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
<?php $this->beginBody() ?>
      
    <div id="wrapper">
        <header id="header">
        <div class="container">
            <?php if(!Yii::$app->user->isGuest) :?>
        <span class="glyphicon glyphicon-user pull-right"><a href="<?= Url::to(['/admin/']) ?>">Адмін-Панель</a></span>
        <br />
        <br />
        
        <?php endif;?>
            <div class="col-lg-4">
                <div id="LogoAll">
                    <a href="<?= Url::home() ?>"><?= Html::img('@web/images/logo.png', ['class' => 'logo', 'alt' => 'Солодкі рецепти']) ?></a>
                <div class="col-lg-6 hidden-sm hidden-md hidden-lg">
                    <br />
                     <br />
                      <a href="<?= Url::home() ?>"><?= Html::img('@web/images/logo-min.png', ['class' => 'logo-min', 'alt' => 'Солодкі рецепти']) ?></a>
                </div>
                </div>
            </div>
            <div class="col-lg-8 topText">
                <p>&nbsp;&nbsp;На сайті ви знайдете смачні 
                <b>рецепти тортів та випічки з фото</b>,<br /> цікаві поради для господині, 
                є можливість <a href="<?= Url::to(['/buy/']) ?>">замовити торт</a> в м.Хотин.<br />
                &nbsp;&nbsp;Всі рецепти тортів та випічки унікальні і ви таких більше не знайдете. Наші соціальні мережі в низу сторінки. Смачного. </p>
            <form method="get" accept-charset=""action="<?= Url::to(['recipe/search']) ?>" id="h-search">
                <input type="text" placeholder="Пошук" name="q" />
                <input type="submit" value="" />
            </form>  
            </div>
        
        <div class="col-lg-12">
            <br/>
            <nav class="navbar-default navbar-static-top" role="navigation">
 <div class="container">
 <div class="row">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 </div>
 <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
 <ul class="nav navbar-nav">
 <li id="button_home" class="">
 <a href="<?= Url::home() ?>"><span class="glyphicon glyphicon-home"></span></a>
 </li>
 <li id="button_home" class="">
<a href="<?= Url::home() ?>">Головна</a>
 </li> 
 <li id="button_rubric" class="dropdown">
 <a class="dropdown-toggle" href="#" data-toggle="dropdown">
Рецепти
 <span class="caret"></span>
 </a>
 <ul class="dropdown-menu" role="menu">
   <?= MenuWidget::widget(['tpl' => 'menu']); ?>
 </ul>
 </li>
 <li id="button_author" class="">
 <a href="<?= Url::to(['/advice/']) ?>">Цікаві поради</a>
 </li>
 <li id="button_blog" class="">
 <a href="<?= Url::to(['/buy/']) ?>">Замовити торт</a>
 </li>
 <li id="button_articles" class="">
 <a href="<?= Url::to(['/reviews/']) ?>">Відгуки</a>
 </li>
 </ul>
 </div>
 </div>
 </div>
</nav>
            
           
        </div>
                  
        </div>
              
        </header>
        </div>
      
    <article>
    <div class="container">
        <div class="col-lg-3">
            </section>
        <section class="aside">
            <div class="categoryMenu">
                <h3>Категорії</h3>  
                <ul class="beads">
                    <?= MenuWidget::widget(['tpl' => 'menu']); ?>
                </ul>
            </div>  
        </section>
        <section class="aside">
            <div class="popul">
                <h3>Популярні рецепти</h3>  
                <ul class="beads">
                    <?= PopulWidget::widget(['tpl' => 'popul']); ?>
                </ul>
            </div>
        </section>
        </div>
            <div class="col-lg-9">
                <?= $content; ?>
            </div>
    </div>
        
    </article>
      <div class="container">
          <div class="col-lg-9 pull-right"> 
              </br>
              <p>&nbsp;&nbsp;Сучасні господині дуже зайняті, але їм хочеться почастувати своїх рідних тортами і випічкою, виготовленими власними руками, приготувати до святкового столу торт за якимось незвичайним рецептом. 
            На сьогоднішній день під словом «торт» мають на увазі солодкий кондитерський виріб, що складається з декількох шарів, з кремом.
              <p>&nbsp;&nbsp;<strong>Торт — це</strong> окраса святкового стола. Печуться вони з пісочного, бісквітного і листкового тіста. За формою торт може бути прямокутним, круглим, фігурним або ступінчастим. Торт може складатися як з одного, так і з кількох шарів тіста. 
                  Весільні торти зазвичай виготовляють в кілька ярусів. Сьогодні багато тортів прикрашаються мастикою і фігурками з неї, а ще дуже вишукано виглядають велюрові торти та торти вкриті дзеркальною глазур’ю.
            Сучасні метри кулінарії віддають перевагу легким, повітряним тортам – це мусові торти.</p> 
            <p>&nbsp;&nbsp;Торт - король солодощів - здатний підняти настрій і принести свято в кожну хату!
                В магазині можливо придбати різноманітні види випічки, але немає кращого за <strong>домашнє печиво</strong>. Такого печива ви не придбаєте в жодному магазині. Випічка може виготовлятися з пісочного, листкового, бісквітного та заварного тіста. 
            В середині можуть бути різноманітні начинки: горіхи, шоколад, згущене молоко тощо.</p>&nbsp;&nbsp;Якщо торт вимагає на приготування багато часу, то печиво займає мало часу і ви можете порадувати ваших рідних смачним печивом до чаю та кави. 
            Такі маленькі смаколики можна готувати в будній день, а не на свято.</p>
            </br>
          </div>
      </div>
  <footer>
    <div class="container">
        <div class="col-lg-12 ">
            <div class="footer">
                <p class="copy">&copy; Солодкі рецепти - <?= date('Y') ?> <a href="<?= Url::to(['/site/index/']) ?>">by88</a></p>     
            </div>
            <div class="social">
                <div class="socialVk">
                    <a href="/vk"><?= Html::img('@web/images/vk.png', ['alt' => 'Солодкі рецепти']) ?></a>
                </div>
                <div class="socialYouT">
                    <a href="/you"><?= Html::img('@web/images/YouTube.png', ['alt' => 'Солодкі рецепти']) ?></a>
                </div>
                <div class="socialFb">
                    <a href="/fb"><?= Html::img('@web/images/fb.png', ['alt' => 'Солодкі рецепти']) ?></a>
                </div>
            </div>          
        </div>
    </div>
  </footer>
     
<?php $this->endBody() ?>    
  </body>
</html>
<?php $this->endPage() ?>
