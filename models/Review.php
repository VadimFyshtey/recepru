<?php


namespace app\models;
use yii\db\ActiveRecord;

class Review extends ActiveRecord{
   
    public static function tableName() {
        return 'review';
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
