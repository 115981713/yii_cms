<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleTags */

$this->title = $model->id;
$this->params['breadcrumbs'][] = '文章管理';
$this->params['breadcrumbs'][] = ['label' => '文章标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除当前文章标签吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tag_name',
            'post_num',
        ],
    ]) ?>

</div>
