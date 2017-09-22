<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\PasswordResetRequest */

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your mobile. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
                'options' => [
                    'class' => 'form-horizontal',
                ],
                'fieldConfig' => [
                    'template' => '{label}<div class="col-lg-6">{input}</div>{hint}{error}',
                    'labelOptions' => [
                        'class' => 'control-label col-lg-2',
                    ],
                ]
            ]); ?>
                <?= $form->field($model, 'mobile') ?>
                <?= $form->field($model, 'smscode')->widget(yii\easyii\widgets\SMSCodeInput::className(),['validator'=>true]) ?>
                <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?= Html::submitButton('下一步', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
