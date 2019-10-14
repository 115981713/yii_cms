<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cats-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'img')->fileInput(['class'=>'upload_img upload-imgs','data' => 'img']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
