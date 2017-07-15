<?php

namespace app\controllers;

use app\models\Category;
use app\models\Recipes;
use yii\data\Pagination;

class CategoryController extends AppController {
    
    public function actionIndex(){
        $query = Recipes::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $allRecipes = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Солодкі рецепти | Рецепт тортів та рецептів', 'Солодкі рецепти, Рецепти тортів, Рецепти випічки, Рецепти українською, Рецепти тортів українською, Рецепти випічки українською, Htwtgnb njhnsd, Htwtgnb', 'На нашому сайті ви найдете смачні та солодкі рецепти торті та рецепти випічки з фото, всі рецепти тортів та випічки українською. Також є можливість замовити торт.');
        return $this->render('index', compact('allRecipes', 'pages'));
        
    }
    
    public function actionView($id){
        
        $category = Category::find()->where(['id' => $id])->one();
        if(empty($category)){
            throw new \yii\web\HttpException(404, 'Такої категорії не існує.');
        }
        
        $query = Recipes::find()->where(['category_id' => $id, 'status' => '1'])->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $recipes = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        $this->setMeta('Солодкі рецепти | ' . $category['name'], $category->keywords, $category->description);
        return $this->render('view', compact('recipes', 'pages', 'category'));
    }
    
}
