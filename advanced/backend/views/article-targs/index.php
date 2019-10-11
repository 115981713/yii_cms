<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章标签';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建文章标签', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'tag_name',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->tag_name;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],             
            [
                'attribute' => 'post_num',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data){
                    return $data->post_num;
                },
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center'],
            ],  
            [
                'header' => Html::a('操作'),
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style'=>'text-align:center;'],
                'contentOptions' => ['class'=>'text-center actions'],
            ],
        ],
    ]); ?>

</div>
