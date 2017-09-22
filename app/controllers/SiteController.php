<?php

namespace app\controllers;

use Yii;
use yii\easyii\modules\page\models\Page;
use yii\web\Controller;
use yii\web\BadRequestHttpException;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'send-sms-code' =>[
                'class' => 'yii\easyii\behaviors\SMSCodeAction'
            ]
        ];
    }

    public function actionIndex()
    {
        if(!Yii::$app->getModule('admin')->installed){
            return $this->redirect(['/install/step1']);
        }
        return $this->render('index');
    }
}