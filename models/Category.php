<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord {
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName() {
        return 'category';
    }
    
    public function getRecipes(){
        return $this->hasMany(Recipes::classname(), ['category_id' => 'id']);
    }
    
}
