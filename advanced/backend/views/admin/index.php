<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->id;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-left'],
            ],   
            [
                'attribute' => 'username',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->username;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-left'],
            ],

            [
                'attribute' => 'email',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->email;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                // 'contentOptions' => ['class'=>'text-center'],
            ],

            [
                // 'attribute' => 'name',
                'header' => Html::a('角色'),
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->name;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                // 'contentOptions' => ['class'=>'text-center'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{summary}',
                'header' => Html::a('状态'),
                'buttons' => [
                    'summary' => function ($url, $model, $key) { 
                        return $model->status == 10 ? Html::button('正常', ['class' => 'btn btn-sm btn-success'] ) : Html::button('已禁用', ['class' => 'btn btn-sm btn-danger'] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],    
            [
                'attribute' => 'avatar',
                'class' => 'yii\grid\DataColumn',
                'format' => [
                    'image',
                    [
                        'height'=>'20'
                    ]
                ],
                'value' => function ($model) {
                    return $model->avatar;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],
            [
                'attribute' => 'created_at',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return date('Y-m-d H:i:s',$data->created_at);
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                // 'contentOptions' => ['class'=>'text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a('操作'),//表单头
                'headerOptions' => ['style'=>'text-align:center;'],//表单头居中
                'contentOptions' => ['class'=>'text-center actions'],//表单内容居中
            ],
        ],
    ]); ?>
</div>
