<?php

namespace app\models;

use yii\db\ActiveRecord;

class Advice extends ActiveRecord {
    
    public static function tableName() {
        return 'advice';
    }
  
}
