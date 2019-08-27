<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理'];
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'summary',
            'content:ntext',
            'label_img',
            'cat_id',
            [
                'attribute' => 'user_id',
                'value'=> $model->username, 
            ],
            'user_name',
            'is_valid',
            [
                'attribute' => 'created_at',
                'value'=> date('Y-m-d H:i:s',$model->created_at), 
            ],
            [
                'attribute' => 'updated_at',
                'value'=> date('Y-m-d H:i:s',$model->updated_at), 
            ],
        ],
    ]) ?>

</div>
