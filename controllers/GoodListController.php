<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class GoodListController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        \yii::$app->view->registerCssFile('/css/good-list.css');
        \yii::$app->view->registerJsFile('/js/sanyou/good-list.js');
        \yii::$app->view->registerJsFile('/js/ajaxupload.js');
        \yii::$app->view->registerJsFile('/js/common/uploader.js');
        $this->layout = 'sanyou-main';
        
        return $this->render('index');
    }

}
