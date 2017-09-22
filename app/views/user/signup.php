<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \yii\easyii\models\User;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;

$user = new User;
?>
<div class="site-signup">

    <p>Please fill out the following fields to signup:</p>
    <?= Html::errorSummary($model)?>
    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
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
                <?= $form->field($model, 'smscode')->widget(yii\easyii\widgets\SMSCodeInput::className()) ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'sex')->inline()->radioList($user->getSexs()) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
