<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\easyii\modules\rbac\components\Helper;
use app\modules\delegate\api\Feedback;

/* @var $this yii\web\View */
/* @var $searchModel yii\easyii\modules\rbac\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员中心';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="module module-divider-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 push-lg-2">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'mobile',
                    'name',
                    [                      // the owner name of the model
                        'label' => '性别',
                        'value' => $model->getSexText(),
                    ],
                    'email:email',
                    'company',
                    'address',
                    'phone',
                    'fax',
                ],
            ])
            ?>
            <p><a href="<?=Url::to(['user/edit'])  ?>" class="btn btn-circle btn-lg btn-brand">修改</a></p>
            
            </div>
            <?= $this->render('_sidebar') ?>
        </div>
    </div>
</section>

