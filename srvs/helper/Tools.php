<?php
namespace app\srvs\helper;

class Tools {
    /**
     * 通过指定的键的值，对数据进行分组
     * 
     * @param array $arr
     * @param string $key
     * @return boolean|array
     */
    public static function arrayGroup($arr, $key, $keepKey = FALSE) {
        $result = array() ;
        if (!is_array($arr) || empty($arr))
        {
        	return $result;
        }
        foreach ($arr as $k => $item) {
            if (!array_key_exists($key, $item)) {
                return false ;
            }
            if (!array_key_exists($item[$key], $result)) {
                $result[$item[$key]] = array() ;
            }
            if ($keepKey) {
                $result[$item[$key]][$k] = $item ;
            } else {
                $result[$item[$key]][] = $item ;
            }
        }
        return $result ;
    }
    
    /**
     * @codeCoverageIgnore
     */
    public static function createDupUpdate(array $data) {
        $subSql = array() ;
        foreach ($data[0] as $key => $value) {
            $subSql[]= '`' . $key . '`=values(`' . $key . '`)' ;
        }
        return ' ON DUPLICATE KEY UPDATE ' . implode(',', $subSql) ;
    }
}