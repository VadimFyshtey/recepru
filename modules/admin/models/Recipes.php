<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "recipes".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $short_content
 * @property string $content
 * @property string $data
 * @property string $is_popul
 * @property string $status
 * @property string $image
 * @property string $keywords
 * @property string $description
 */
class Recipes extends \yii\db\ActiveRecord
{

    public $image;


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipes';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

        /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'short_content', 'content', 'data'], 'required'],
            [['category_id', 'is_popul', 'status'], 'integer'],
            [['short_content', 'content'], 'string'],
            [['data'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['keywords', 'description'], 'string', 'max' => 200],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категорія',
            'name' => 'Назва',
            'short_content' => 'Короткий запис',
            'content' => 'Контент',
            'data' => 'Дата',
            'is_popul' => 'Популярний',
            'status' => 'Відображати на сайті',
            'image' => 'Картинка',
            'keywords' => 'Ключові слова(SEO)',
            'description' => 'Описання(SEO)',
        ];
    }
    
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
