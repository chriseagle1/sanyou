<?php
namespace app\controllers\ajax\sanyou;

use app\controllers\ajax\AjaxController;
class OrderController extends AjaxController {
    public function actionAjaxCreateOrder() {
        $params = \Yii::$app->request->post();
        
    }
    
}