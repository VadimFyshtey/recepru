<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "buy".
 *
 * @property string $id
 * @property string $content
 */
class Buy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Контент',
        ];
    }
}
