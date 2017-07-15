<?php

namespace app\components;

use yii\base\Widget;
use app\models\Buy;
use Yii;

class BuyWidget extends Widget{
    
    public $tpl;
    public $data;
    public $menuHtml;


    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'buy';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        if($this->tpl == 'buy.php'){
           $buys = Yii::$app->cache->get('buy');
           if($buys) return $buys;
        }

        $this->data = Buy::find()->asArray()->all();
        $this->menuHtml = $this->getMenuHtml($this->data);
        if($this->tpl == 'buy.php'){
            Yii::$app->cache->set('buy', $this->menuHtml, 3600*24*2);
        }
        return $this->menuHtml;
    }
    
    protected function getMenuHtml($data){
        $str = '';
        foreach ($data as $buy){
            $str .= $this->catToTemplate($buy);
        }
        return $str;
    }
    
    protected function catToTemplate($buy){
        ob_start();
        include __DIR__ . '/tpl/' . $this->tpl;
        return ob_get_clean();
    }
    
}