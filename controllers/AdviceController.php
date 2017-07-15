<?php

namespace app\controllers;

class AdviceController extends AppController {

     public function actionIndex(){
        $this->setMeta('Солодкі рецепти | Поради для гарної господині', 'Солодкі рецепти, Рецепти тортів, Рецепти випічки, Рецепти українською, Рецепти тортів українською, Рецепти випічки українською, Htwtgnb njhnsd, Htwtgnb', 'На нашому сайті ви найдете смачні та солодкі рецепти торті та рецепти випічки з фото, всі рецепти тортів та випічки українською. Також є можливість замовити торт.');
        return $this->render('index', compact('advice'));
    }
    
}
