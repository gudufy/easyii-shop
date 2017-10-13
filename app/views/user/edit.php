<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\easyii\modules\rbac\components\Helper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii\easyii\modules\rbac\models\User */

$this->title = '个人资料';
$this->params['breadcrumbs'][] = ['label' => '会员中心', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>

<section class="module module-divider-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 push-lg-2">
                <?php $form = ActiveForm::begin([
                    'enableClientValidation' => true,
                    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form'],
                ]); ?>
                    <?= $form->field($model, 'mobile')->textInput(['disabled' => 'disabled']) ?>
                    <?= $form->field($model, 'email')->textInput() ?>
                    <?= $form->field($model, 'name')->textInput() ?>
                    <?= $form->field($model, 'sex')->radioList($model->getSexs()) ?>
                    <?= $form->field($model, 'company')->textInput() ?>
                    <?= $form->field($model, 'address')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'fax')->textInput() ?>
                    <div class="form-group">
                    <?= Html::submitButton('保 存', ['class' => 'btn btn-circle btn-lg btn-brand']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?= $this->render('_sidebar') ?>
        </div>
    </div>
</section>
