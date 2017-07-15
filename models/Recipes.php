<?php

namespace app\models;

use yii\db\ActiveRecord;

class Recipes extends ActiveRecord{
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName() {
        return 'recipes';
    }
    
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function getComment(){
        return $this->hasMany(Comment::className(), ['recipe_id' => 'id']);
    }
    
    public function getRecipesComments(){
        return $this->getComment()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->all();
    }
    
    public function viewedCounter(){
        
        if($this->view == 9999){
            return;
        }
        $this->view += 1;
        return $this->save(false);
    }
    
}
