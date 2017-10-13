<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\ResetPassword */

$this->title = '重置密码';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <p>请输入新密码。</p>
                <div class="up-form text-left">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>$model->getAttributeLabel('password')])->label(false) ?>
                        <div class="form-group text-center">
                            <?= Html::submitButton('提交', ['class' => 'btn btn-circle btn-lg btn-brand']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
