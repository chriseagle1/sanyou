<?php
namespace app\models\sanyou;

use yii\db\ActiveRecord;
use app\srvs\helper\Tools;

class ProductStock extends ActiveRecord {
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'product_stock';
    }
    
    /**
     * 批量插入数据
     * @param unknown $products
     */
    public function batchInsert($stock_infos) {
        if (!is_array($stock_infos) || empty($stock_infos[0])) {
            return false;
        }
        $columns = array_keys($stock_infos[0]);
        
        $prodSql = \Yii::$app->db->getQueryBuilder()->batchInsert(self::tableName(), $columns, $stock_infos);
        $sql = $prodSql . Tools::createDupUpdate($stock_infos);
        
        return $this->getDb()->createCommand($sql)->execute();
    }
}