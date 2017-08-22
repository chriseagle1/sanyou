<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CastAccountsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        \yii::$app->view->registerCssFile('/css/cast-accounts.css', ['depends'=>  'app\assets\AppAsset']);
        $this->layout = 'sanyou-main';
        \yii::$app->view->registerJsFile('/js/sanyou/cast-accounts.js');
        return $this->render('index');
    }
    
    public function actionTest() {
        $this->layout = 'sanyou-main';
        \yii::$app->view->registerCssFile('/css/cast-accounts.css');
        \yii::$app->view->registerJsFile('/js/sanyou/cast-accounts.js');
        \yii::$app->view->registerJsFile('/js/ajaxupload.js');
        \yii::$app->view->registerJsFile('/js/common/uploader.js');
        
        return $this->render('test', ['test' => 11]);
    }

}
