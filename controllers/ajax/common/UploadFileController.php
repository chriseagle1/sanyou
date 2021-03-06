<?php
namespace app\controllers\ajax\common;

use Yii;
use app\controllers\ajax\AjaxController;

class UploadFileController extends AjaxController {
    
    public function actionAjaxUploader() {
        try {
            $file = $_FILES['uploadFileName'];
            $uploadType = \yii::$app->request->get('uploadType', 'product');
            
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
            
            $readSrvs = new \app\srvs\sanyou\ReadExcel();
            $excelData = $readSrvs->readExcelData($filePath, $type);
            if ($uploadType == 'product') {
                $srvs = new \app\srvs\sanyou\ProductService();
                $srvs->handleImportData($excelData);
            }
            
            unset($filePath);
            $res= $this->ajaxResponse(1, '导入成功！') ;
            $res->format= 'html';
            
            return json_encode($res);
        } catch (\Exception $ex) {
            var_dump($ex->getMessage());exit;
            \Yii::error($ex->getMessage(), 'error');
            $res= $this->ajaxResponse(1, '导入失败!') ;
            $res->format= 'html';
            
            return json_encode($res);
        }
    }
}