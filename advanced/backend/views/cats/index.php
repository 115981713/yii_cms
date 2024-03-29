<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章分类';
$this->params['breadcrumbs'][] = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建文章分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'attribute' => 'cat_name',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->cat_name;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],  

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{content}',
                'header' => Html::a('图标'),
                'buttons' => [
                    'content' => function ($url, $model, $key) { 
                        return $model['img'] ? Html::button('查看图片', ['class' => 'btn btn-sm btn-success img look_image','data' => $model['img']] ) : ''; 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{is_valid}',
                'header' => Html::a('状态'),
                'buttons' => [
                    'is_valid' => function ($url, $model, $key) { 
                        return $model['status'] == 1 ? Html::button('正常', ['class' => 'btn btn-sm btn-success'] ) : Html::button('无效', ['class' => 'btn btn-sm btn-danger'] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a('操作'),//表单头
                'template' => '{view}{update}{void}{valid}',//操作按钮
                'buttons' => [//操作链接
                    'void' => function ($url, $model, $key) {
                        return $model['status'] == 1 ? Html::a('<span class="glyphicon glyphicon-remove layer_confirm" data="'.$model->id.'" data-c="cats" data-a="void" data-title="分类:'.$model->cat_name.',设置为无效"></span>', '#', ['title' => '设置为无效'] ) : ''; 
                    }
                    ,'valid' => function ($url, $model, $key) {
                        return $model['status'] == 0 ? Html::a('<span class="glyphicon glyphicon-ok layer_confirm"  data="'.$model->id.'" data-c="cats" data-a="valid" data-title="分类:'.$model->cat_name.',设置为有效"></span>', '#', ['title' => '设置为有效'] ) : ''; 
                    },
                ],
                'headerOptions' => ['style'=>'text-align:center;'],//表单头居中
                'contentOptions' => ['class'=>'text-center actions'],//表单内容居中
            ],
        ],
    ]); ?>

</div>
