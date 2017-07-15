<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget{
    
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;


    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        if($this->tpl == 'menu.php'){
           $menu = Yii::$app->cache->get('menu');
           if($menu) return $menu;
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->menuHtml = $this->getMenuHtml($this->data);
        if($this->tpl == 'menu.php'){
            Yii::$app->cache->set('menu', $this->menuHtml, 3600*24*7);
        }
        return $this->menuHtml;
    }
    
    protected function getMenuHtml($data){
        $str = '';
        foreach ($data as $category){
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }
    
    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/tpl/' . $this->tpl;
        return ob_get_clean();
    }
    
}