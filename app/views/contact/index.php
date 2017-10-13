<?php
use yii\easyii\modules\feedback\api\Feedback;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-contact');

$this->title = $page->seo('title', $page->model->title);
$this->registerMetaTag(array("name"=>"keywords","content"=>$page->seo('keywords'))); 
$this->registerMetaTag(array("name"=>"descripition","content"=>$page->seo('description')));
//$this->params['breadcrumbs'][] = $page->model->title;
$this->params['h1'] = $page->seo('h1');
$this->params['title'] = $page->model->title;
?>
<h1><?= $page->seo('h1', $page->title) ?></h1>


<div class="row">
    <div class="col-md-8">
        <?= $page->text ?>
    </div>
    <div class="col-md-4">
        <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
            <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Message successfully sent</h4>
        <?php else : ?>
            <div class="well well-sm">
                <?= Feedback::form() ?>
            </div>
        <?php endif; ?>
    </div>
</div>

