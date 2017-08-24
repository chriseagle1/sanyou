<?php
namespace app\controllers\ajax\sanyou;

use app\controllers\ajax\AjaxController;
class CastAccountController extends AjaxController {
    public function actionAjaxQueryGood() {
        $productNo = \Yii::$app->request->post('productNo', '');
        $srvs = new \app\models\sanyou\Product();
    
        $goodInfo = $srvs->find()->where(['product_no' => $productNo])->one();
        
        if ($goodInfo) {
            $result = [
                'num' => $goodInfo->product_no,
                'name' => $goodInfo->product_name,
                'unit' => $goodInfo->specification . '/' . $goodInfo->unit,
                'price' => $goodInfo->retail_price,
            ];
            return $this->ajaxResponse(1, 'succ', $result);
        } else {
            return $this->ajaxResponse(0, '商品不存在');
        }
    }
    
}