<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \yii\easyii\modules\rbac\models\form\ChangePassword */

$this->title = '修改密码';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="module module-divider-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 push-lg-2">
                <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                    <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                    <?= $form->field($model, 'newPassword')->passwordInput() ?>
                    <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton('修 改', ['class' => 'btn btn-circle btn-lg btn-brand', 'name' => 'change-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?= $this->render('_sidebar') ?>
        </div>
    </div>
</section>
