<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Auth */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'auth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pid')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
