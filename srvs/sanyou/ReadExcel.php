<?php
namespace app\srvs\sanyou;

use yii\base\Object;
class ReadExcel extends Object {
    
    public function readExcelData($file_path, $file_type) {
        if ($file_type == 'xlsx' || $file_type == 'xls') {
            $reader = \PHPExcel_IOFactory::createReader('Excel2007'); // 读取 excel 文档
        } else if ($file_type == 'csv') {
            $reader = \PHPExcel_IOFactory::createReader('CSV'); // 读取 CSV 文档
        } else {
            return false;
        }
        
        $phpExcel = $reader->load($file_path);
        $objWorksheet = $phpExcel->getActiveSheet();
        
        $data = [];
        foreach ($objWorksheet->getRowIterator() as $row) {
            //确定从哪一行开始读取
            $rowIndex = $row->getRowIndex();
            if ($rowIndex < 2) {
                continue;
            }
        
            $rowItem = [];
            foreach ($row->getCellIterator() as $key => $cell) {//逐列读取
                $value = $cell->getValue(); //获取cell中数据
                if(is_object($value)){
                    $value = $value->__toString();    
                }
                $rowItem[] = $value;
            }
            $data[] = $rowItem;
        }
        
        return $data;
    }
}