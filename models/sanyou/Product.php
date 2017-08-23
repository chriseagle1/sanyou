<?php
namespace app\models\sanyou;

use yii\db\ActiveRecord;
use app\srvs\helper\Tools;

class Product extends ActiveRecord {
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'product';
    }
    
    /**
     * 批量插入数据
     * @param unknown $products
     */
    public function batchInsert($products) {
        if (!is_array($products) || empty($products[0])) {
            return false;
        }
        $columns = array_keys($products[0]);
        $prodSql = \Yii::$app->db->getQueryBuilder()->batchInsert(\app\models\sanyou\Product::tableName(), $columns, $products);
        $sql = $prodSql . Tools::createDupUpdate($products);
        
        return $this->getDb()->createCommand($sql)->execute();
    }
}