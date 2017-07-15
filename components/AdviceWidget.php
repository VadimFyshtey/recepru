<?php

namespace app\components;

use yii\base\Widget;
use app\models\Advice;
use Yii;

class AdviceWidget extends Widget{
    
    public $tpl;
    public $data;
    public $menuHtml;


    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'advice';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        if($this->tpl == 'advice.php'){
           $advices = Yii::$app->cache->get('advice');
           if($advices) return $advices;
        }

        $this->data = Advice::find()->asArray()->all();
        $this->menuHtml = $this->getMenuHtml($this->data);
        if($this->tpl == 'advice.php'){
            Yii::$app->cache->set('advice', $this->menuHtml, 3600*24*2);
        }
        return $this->menuHtml;
    }
    
    protected function getMenuHtml($data){
        $str = '';
        foreach ($data as $advice){
            $str .= $this->catToTemplate($advice);
        }
        return $str;
    }
    
    protected function catToTemplate($advice){
        ob_start();
        include __DIR__ . '/tpl/' . $this->tpl;
        return ob_get_clean();
    }
    
}