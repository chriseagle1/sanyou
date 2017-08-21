<?php
namespace app\controllers\ajax\common;

use Yii;
use yii\web\Controller;

class UploadFileController extends Controller {
    public function actionAjaxUploader() {
        $type = 'xlsx';
        $file_path = '';
        
        if ($type == 'xlsx' || $type == 'xls') {
            $reader = \PHPExcel_IOFactory::createReader('Excel2007'); // 读取 excel 文档
        } else if ($type == 'csv') {
            $reader = \PHPExcel_IOFactory::createReader('CSV'); // 读取 CSV 文档
        } else {
            die('Not supported file types!');
        }
        
        $phpExcel = $reader->load($file_path);
        $objWorksheet = $phpExcel->getActiveSheet();
    }
}