<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error content">

    <h1><?= Html::encode($this->title) ?></h1>
    </br>
    <div class="alert alert-danger">
        <center><?= nl2br(Html::encode($message)) ?></center>
    </div>
    <hr>
    <p>
        Сталася помилка, данної сторінкі не існує або вона в процесі створення. Будь-ласка перейдіть на <a href="/">головну</a>.
    </p>
    </br>

</div>
