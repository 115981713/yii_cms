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
<?php $this->registerJsFile('/libs/ueditor1.4/ueditor.config.js');?>
<?php $this->registerJsFile('/libs/ueditor1.4/ueditor.all.js');?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::button('删除', [
            'class' => 'btn btn-danger delete',
            'data' => $model->id,
            'data-c' => 'article',
            'data-v' => 'article',
        ]) ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'summary',
            'content:html',

            [
                'attribute' => 'label_img',
                'format' => ['image',['width'=>'40','height'=>'40',]],
            ],
            [
                'attribute' => 'cat_id',
                'value'=> $model->cat_name, 
            ],
            // [
            //     'attribute' => 'user_id',
            //     'value'=> $model->username, 
            // ],
            // 'user_name',
            [
                'attribute' => 'is_valid',
                'value' => $model->is_valid == 1 ? '已发布' : '未发布',
            ],
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
<?php
$this->registerJs('
    var ue = UE.getEditor("container");
'
, \yii\web\View::POS_END);
