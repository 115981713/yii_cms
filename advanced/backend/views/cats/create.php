<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cats */

$this->title = '新建文章分类';
$this->params['breadcrumbs'][] = '文章管理';
$this->params['breadcrumbs'][] = ['label' => '文章分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
