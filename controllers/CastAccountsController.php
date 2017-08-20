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
        
        return $this->render('index');
    }

}
