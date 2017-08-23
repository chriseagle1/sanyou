<?php
namespace app\controllers\ajax;

use yii\web\Controller;
class AjaxController extends Controller {
    
    public $enableCsrfValidation = false;
    
    //ajax接口返回数据
    public function ajaxResponse($is_success = 1, $msg = '', $result = []) {
        $response = \Yii::$app->response;
        $response->format = $response::FORMAT_JSON;
        $sub_ticket = '';
        if (isset($result['sub_ticket'])) {
            $sub_ticket = $result['sub_ticket'];
        }
        $result = ['isSuccess' => $is_success, 'message' => $msg, 'result' => $result, 'sub_ticket' => $sub_ticket];
        $response->data = $result;
        return $response;
    }
}