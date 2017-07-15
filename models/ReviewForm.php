<?php

namespace app\models;
use yii\helpers\Html;
use yii\base\Model;

class ReviewForm extends Model {
    
    public $content;
    public $name;
    public $captcha;
    
    public function rules() {
        
        return [
            [['content', 'name'], 'required'],
            [['content', 'name'], 'trim'],
            [['content'], 'string', 'min' => 3, 'max' => 1000],
            [['name'], 'string', 'min' => 2, 'max' => 30],
            [['captcha'], 'captcha'],
            [['data'], 'safe'],
        ];
        
    }  
    
    public function attributeLabels() {
        return [
            'name' => "Ваше ім'я:",
            'content' => "Ваш відгук:",
            'captcha' => "Капча:",
        ];
    }

        public function saveComment(){
        $content = new Review;
        $content['content'] = Html::encode($this->content);
        $content['name'] = Html::encode($this->name);
        $content['data'] = date("Y-m-d");
        $content['status'] = 0;
        return $content->save();
    }
    
}
