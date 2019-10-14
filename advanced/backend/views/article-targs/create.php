<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ArticleTags */

$this->title = '新建文章标签';
$this->params['breadcrumbs'][] = '文章管理';
$this->params['breadcrumbs'][] = ['label' => '文章标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
