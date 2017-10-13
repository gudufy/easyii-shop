<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \yii\easyii\models\User;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\Signup */

$this->title = '绑定';
//$this->params['breadcrumbs'][] = $this->title;

$user = new User;
?>

<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="up-form text-left">
                    <?php $form = ActiveForm::begin([
                            'id' => 'form-bind',
                        ]); ?>
                        <?= $form->field($model, 'mobile')->textInput(['placeholder'=>$model->getAttributeLabel('mobile')])->label(false) ?>
                        <?= $form->field($model, 'smscode')->widget(yii\easyii\widgets\SMSCodeInput::className(),['validator'=> null ,'placeholder'=>$model->getAttributeLabel('smscode'),'btnCssClass'=>'btn btn-gray'])->label(false) ?>
                        <?= $form->field($model, 'name')->textInput(['placeholder'=>$model->getAttributeLabel('name')])->label(false) ?>
                        <?= $form->field($model, 'sex')->inline()->dropdownList($user->getSexs())->label(false) ?>
                        <div class="form-group">
                            <?= Html::submitButton('绑 定', ['class' => 'btn btn-block btn-lg btn-round btn-brand', 'name' => 'login-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="up-help">
                    <p>绑定后您可以凭该手机号在PC端进行登录</p>
                </div>
            </div>
        </div>
    </div>
</section>

