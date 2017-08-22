<?php
namespace app\models\sanyou;

use yii\db\ActiveRecord;

class Product extends ActiveRecord {
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'product';
    }
}