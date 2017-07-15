<?php

namespace app\models;
use yii\helpers\Html;
use yii\base\Model;

class CommentForm extends Model {
    
    public $comment;
    public $name;
    public $captcha;

    public function rules() {
        
        return [
            [['comment', 'name'], 'required'],
            [['comment', 'name'], 'trim'],
            [['comment'], 'string', 'min' => 3, 'max' => 1000],
            [['name'], 'string', 'min' => 2, 'max' => 30],
            [['captcha'], 'captcha'],
            [['data'], 'safe'],
        ];
        
    }  
    
    public function attributeLabels() {
        return [
            'name' => "Ваше ім'я:",
            'comment' => "Ваш коментарій:",
            'captcha' => "Капча:",
        ];
    }

        public function saveComment($recipe_id){
        $comment = new Comment;
        $comment->comment = Html::encode($this->comment);
        $comment->name = Html::encode($this->name);
        $comment->data = date("Y-m-d");
        $comment->recipe_id = $recipe_id;
        $comment->status = 0;
        return $comment->save();
    }
    
}
