<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\PasswordResetRequest */

$this->title = '找回密码';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <p>请验证您注册时的手机号码。</p>
                <div class="up-form text-left">
                    <?php $form = ActiveForm::begin([
                        'id' => 'request-password-reset-form',
                    ]); ?>
                        <?= $form->field($model, 'mobile')->textInput(['placeholder'=>$model->getAttributeLabel('mobile')])->label(false) ?>
                        <?= $form->field($model, 'smscode')->widget(yii\easyii\widgets\SMSCodeInput::className(),['validator'=>'forget','placeholder'=>$model->getAttributeLabel('smscode'),'btnCssClass'=>'btn btn-gray'])->label(false) ?>
                        <div class="form-group text-center">
                            <?= Html::submitButton('下一步', ['class' => 'btn btn-circle btn-lg btn-brand', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
