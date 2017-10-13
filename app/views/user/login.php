<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\Login */

$this->title = '登录';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="up-form text-left">
                    <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                        ]); ?>
                        <?= $form->field($model, 'username')->textInput(['placeholder'=>$model->getAttributeLabel('username')])->label(false) ?>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>$model->getAttributeLabel('password')])->label(false) ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <div class="form-group text-center">
                            <?= Html::submitButton('登 录', ['class' => 'btn btn-circle btn-lg btn-brand', 'name' => 'login-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="up-help">
                    <p>如果你忘记了密码，请 <?= Html::a('点这里找回', ['user/request-password-reset-mobile']) ?>.</p>
                    <p>对于新用户, 您可以 <?= Html::a('免费注册', ['user/signup']) ?>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

