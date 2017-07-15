<?php

namespace app\modules\admin\controllers;

use app\models\Comment;

class CommentController extends AppAdminController {
    
    public function actionIndex(){
        $comments = Comment::find()->orderBy('id desc')->all();
        
        return $this->render('index', compact('comments'));
    }
    
    public function actionDelete($id){
        $comment = Comment::findOne($id);
        if($comment->delete()){
            return $this->redirect(['comment/index']);
        }
    }
    
    public function actionAllow($id){
        $comment = Comment::findOne($id);
        if($comment->allow()){
            return $this->redirect(['index']);
        }
    }
    
     public function actionDisallow($id){
        $comment = Comment::findOne($id);
        if($comment->disallow()){
            return $this->redirect(['index']);
        }
    }
    
    
}
