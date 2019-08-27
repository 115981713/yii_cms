<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
$this->params['breadcrumbs'][] = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'summary',
            'content:ntext',
            'label_img',
            // 'cat_id',
            [
                'attribute' => 'user_id',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->username;
                },
            ],
            // 'user_name',
            // 'is_valid',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{status}',
                'header' => Html::a('状态','/article/index?sort=status',['data-sort'=>'status','class' => 'status']),
                'buttons' => [
                    'status' => function ($url, $model, $key) { 
                        return Html::a(Html::button('状态', ['class' => 'btn btn-sm'] ),'/article/create'); 
                    }
                ],
            ],
            
            [   
                'header' => Html::a('操作'),
                'class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
