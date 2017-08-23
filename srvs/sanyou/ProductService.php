<?php
namespace app\srvs\sanyou;

use yii\base\Object;
class ProductService extends Object {
    
    public function handleImportData($import_data) {
        //将商品信息存入商品表
        if (!is_array($import_data) || empty($import_data)) {
            return false;
        }
        
        $products = [];
        $procuctStock = [];
        foreach ($import_data as $prod) {
            $products[] = [
                'product_no' => $prod[1],
                'product_name' => $prod[2],
                'brand' => $prod[7] ? $prod[7] : '',
                'unit' => $prod[3] ? $prod[3] : '',
                'specification' => $prod[4] ? $prod[4] : '',
                'retail_price' => $prod[5],
                'vip_price' => $prod[6]
            ];
            $procuctStock[] = [
                'product_no' => $prod[1],
                'stock' => $prod[8] > 0 ? $prod[8] : 0,
            ];
        }
        $prodSrvs = new \app\models\sanyou\Product();
        $prodSrvs->batchInsert($products);
        //将库存信息存入库存表
        $stockSrvs = new \app\models\sanyou\ProductStock();
        $stockSrvs->batchInsert($procuctStock);
        
        return true;
    }
}