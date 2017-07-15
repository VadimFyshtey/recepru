<?php

namespace app\controllers;

use app\models\Recipes;
use Yii;
use yii\data\Pagination;
use app\models\CommentForm;

class RecipeController extends AppController {
    
    public function actionView($id){
        
        $recipe = Recipes::find()->asArray()->with('category')->where(['id' => $id, 'status' => '1'])->limit(1)->one();
        $recImg = Recipes::find()->where(['id' => $id, 'status' => '1'])->limit(1)->one();
        
        $re = Recipes::findOne($id);
       
        if(empty($re)){
            throw new \yii\web\HttpException(404, 'Такого рецепта поки що не існує.');
        }
        $re->viewedCounter();
        $comments = $re->getRecipesComments();
        
        $commentsForm = new CommentForm();
       
        if(empty($recipe)){
            throw new \yii\web\HttpException(404, 'Такого рецепта поки що не існує.');
        }

        $mainImage = $recImg->getImage();
        $this->setMeta('Солодкі рецепти | ' . $recipe['name'], $recipe['keywords'], $recipe['description']);
        return $this->render('view', compact('recipe', 'mainImage', 'comments', 'commentsForm'));
    }
    
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Солодкі рецепти | Пошук: ' . $q, 'Солодкі рецепти, Рецепти тортів, Рецепти випічки, Рецепти українською, Рецепти тортів українською, Рецепти випічки українською, Htwtgnb njhnsd, Htwtgnb', 'На нашому сайті ви найдете смачні та солодкі рецепти випічки та тортів, всі рецепти тортів та випічки українською. Також є можливість замовити торт.');
        if(!$q) return $this->render('search');
        $query = Recipes::find()->where(['like', 'name', $q])->andWhere(['status' => '1'])->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $recipes = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('recipes', 'pages', 'q'));
    }
    
    public function actionComment($id){
       
        $model = new CommentForm;
        
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id)){
                 Yii::$app->session->setFlash('success', "{$model->name} ваш коментарій додано і чекає на одобрення адміністрації");
                return $this->redirect(['recipe/view', 'id' => $id]);
            }
        }
        
    }
    
}
