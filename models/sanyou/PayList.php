<?php
namespace app\models\sanyou;

use yii\db\ActiveRecord;

class PayList extends ActiveRecord {
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'pay_list';
    }
    
}