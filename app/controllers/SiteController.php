<?php

namespace app\controllers;

use Yii;
use yii\easyii\modules\page\models\Page;
use yii\easyii\helpers\SMS;
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
        ];
    }

    public function actionIndex()
    {
        if(!Yii::$app->getModule('admin')->installed){
            return $this->redirect(['/install/step1']);
        }
        return $this->render('index');
    }

    /**
     * 注册时发送短信验证码
     * @throws BadRequestHttpException
     */
     public function actionSendSmsCode() {
        $mobile = Yii::$app->request->getQueryParam('mobile');
        if (SMS::sendSms($mobile)) {
            return true;
        } else {
            throw new BadRequestHttpException('验证码发送失败');
        }
    }
}