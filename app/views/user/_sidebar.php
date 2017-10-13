<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yii\easyii\modules\rbac\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-2 pull-lg-10">
    <div class="sidebar sidebar-left">
        <aside class="widget widget_categories">
            <ul>
                <li><a href="<?=Url::to(['user/index'])  ?>">个人中心</a></li>
                <li><a href="<?=Url::to(['user/profile'])  ?>">个人资料</a></li>
                <li><a href="<?=Url::to(['user/change-password'])  ?>">密码修改</a></li>
                <li><a href="<?=Url::to(['user/logout'])  ?>">退出登录</a></li>
            </ul>
        </aside>
    </div>
</div>