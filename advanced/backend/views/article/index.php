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
            // ['class' => 'yii\grid\SerialColumn'],          
            [
                'attribute' => 'title',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->title;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],                                
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{summary}',
                'header' => Html::a('摘要'),
                'buttons' => [
                    'summary' => function ($url, $model, $key) { 
                        return Html::button('摘要详情', ['class' => 'btn btn-sm btn-success look_content','data' => $model['summary'],'data-title' => $model->title] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],            

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{content}',
                'header' => Html::a('内容'),
                'buttons' => [
                    'content' => function ($url, $model, $key) { 
                        return Html::button('内容详情', ['class' => 'btn btn-sm btn-success look_content','data' => $model['content'],'data-title' => $model->title] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{content}',
                'header' => Html::a('标签图'),
                'buttons' => [
                    'content' => function ($url, $model, $key) { 
                        return $model['label_img'] ? Html::button('查看图片', ['class' => 'btn btn-sm btn-success label_img look_image','data' => $model['label_img']] ) : ''; 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],
            // [
            //     'attribute' => 'label_img',
            //     'class' => 'yii\grid\DataColumn',
            //     'format' => [
            //         'image',
            //         [
            //             'width'=>'84',
            //             'height'=>'84'
            //         ]
            //     ],
            //     'value' => function ($model) {
            //         return $model->label_img;
            //     },
            //     'headerOptions' => ['style'=>'text-align:center;'],
            //     'contentOptions' => ['class'=>'text-center'],
            // ],
            [
                'attribute' => 'user_id',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->username;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{is_valid}',
                'header' => Html::a('发布状态','/article/index?sort=is_valid',['data-sort'=>'is_valid']),
                'buttons' => [
                    'is_valid' => function ($url, $model, $key) { 
                        return $model['is_valid'] == 1 ? Html::button('已发布', ['class' => 'btn btn-sm btn-success'] ) : Html::button('未发布', ['class' => 'btn btn-sm btn-danger'] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{status}',
            //     'header' => Html::a('状态','/article/index?sort=status',['data-sort'=>'status','class' => 'status']),
            //     'buttons' => [
            //         'status' => function ($url, $model, $key) { 
            //             return Html::button('状态', ['class' => 'btn btn-sm'] ); 
            //         }
            //     ],
            //     'headerOptions' => ['style'=>'text-align:center;'],
            //     'contentOptions' => ['class'=>'text-center'],
            // ],
            
            [   
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a('操作'),//表单头
                'template' => '{view}{update}{delete}',//操作按钮
                'buttons' => [//操作链接
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash delete" data="'.$model->id.'" data-title="文章" data-c="article"></span>', '#', ['title' => '删除'] ); 
                    }
                ],
                'headerOptions' => ['style'=>'text-align:center;'],//表单头居中
                'contentOptions' => ['class'=>'text-center actions'],//表单内容居中
            ],

        ],
    ]); ?>

</div>

