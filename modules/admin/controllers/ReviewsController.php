<?php

namespace app\modules\admin\controllers;

use app\models\Review;

class ReviewsController extends AppAdminController {
    
    public function actionIndex(){
        $reviews = Review::find()->orderBy('id desc')->all();
        
        return $this->render('index', compact('reviews'));
    }
    
    public function actionDelete($id){
        $reviews = Review::findOne($id);
        if($reviews->delete()){
            return $this->redirect(['reviews/index']);
        }
    }
    
    public function actionAllow($id){
        $reviews = Review::findOne($id);
        if($reviews->allow()){
            return $this->redirect(['index']);
        }
    }
    
     public function actionDisallow($id){
        $reviews = Review::findOne($id);
        if($reviews->disallow()){
            return $this->redirect(['index']);
        }
    }
    
    
}
