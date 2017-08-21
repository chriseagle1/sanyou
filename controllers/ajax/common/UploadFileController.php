<?php
namespace app\controllers\ajax\common;

use Yii;
use yii\web\Controller;

class UploadFileController extends Controller {
    public function actionAjaxUploader() {
        $file = $_FILES['uploadFileName'];
        if (empty($file['size'])) {
            $res= $this->ajax_response(0, '上传文件为空') ;
            $res->format= 'html';
        
            return json_encode($res);
        }
        if ($file['error']) {
            $res= $this->ajax_response(0, '上传文件出错') ;
            $res->format= 'html';
            return json_encode($res);
        }
        
        $type = pathinfo($file['name'], PATHINFO_EXTENSION); //非严格意义的从原文件名上获取到的扩展名
        $type = strtolower($type);
        $validExt = ['xls','xlsx', 'csv'];
        if (!in_array($type, $validExt)) {
            $res= $this->ajax_response(0, '只支持EXCEL文件类型！') ;
            $res->format= 'html';
            return json_encode($res);
        }
        
        $fileName = md5($file['name'] . '#' . date('YmdHis') . '_' . rand(10000, 99999)) . '.' . $type;
        $filePath = \Yii::getAlias('@webroot') . '/attachs/' . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
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