<?php

namespace app\controllers;
use app\models\Review;
use app\models\ReviewForm;
use Yii;
class ReviewsController extends AppController{
    
    public function actionIndex(){
        
        $reviews = Review::find()->asArray()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $reviewForm = new ReviewForm;
       $this->setMeta('Солодкі рецепти | Відгуки', 'Солодкі рецепти, Рецепти тортів, Рецепти випічки, Рецепти українською, Рецепти тортів українською, Рецепти випічки українською, Htwtgnb njhnsd, Htwtgnb', 'На нашому сайті ви найдете смачні та солодкі рецепти торті та рецепти випічки з фото, всі рецепти тортів та випічки українською. Також є можливість замовити торт.');
        return $this->render('index', compact('reviews', 'reviewForm'));
    }
    
    public function actionComment(){
       
        $model = new ReviewForm;
        
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->saveComment()){
                 Yii::$app->session->setFlash('success', "{$model->name} ваш відгук додано і чекає на одобрення адміністрації");
                return $this->redirect(['reviews/index']);
            }
        }
        
    }
    
}
