<?php
namespace app\models\sanyou;

use yii\db\ActiveRecord;

class OrderDetail extends ActiveRecord {
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'order_detail';
    }
    
}