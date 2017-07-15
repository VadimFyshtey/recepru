<?php

namespace app\components;

use yii\base\Widget;
use app\models\Recipes;
use Yii;

class PopulWidget extends Widget{
    
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;


    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'popul';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        
        $popul = Yii::$app->cache->get('popul');
        if($popul) return $popul;
        
        $this->data = Recipes::find()->where(['is_popul' => '1', 'status' => '1'])->orderBy(['id' => SORT_DESC])->limit('6')->asArray()->all();
        $this->menuHtml = $this->getMenuHtml($this->data);
        Yii::$app->cache->set('popul', $this->menuHtml, 3600*24*2);
        return $this->menuHtml;
    }
    
    protected function getMenuHtml($data){
        $str = '';
        foreach ($data as $recipes){
            $str .= $this->catToTemplate($recipes);
        }
        return $str;
    }
    
    protected function catToTemplate($recipes){
        ob_start();
        include __DIR__ . '/tpl/' . $this->tpl;
        return ob_get_clean();
    }
    
}