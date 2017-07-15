<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord{
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName() {
        return 'comment';
    }
    
  
    
    public function getRecipes(){
        return $this->hasOne(Recipes::className(), ['id' => 'recipe_id']);
    }
    
    public function isAllowed(){
        return $this->status;
    }
    
    public function allow(){
        $this->status = 1;
        return $this->save(false);
    }
    
     public function disallow(){
        $this->status = 0;
        return $this->save(false);
    }
    
}
