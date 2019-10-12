<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $this->registerJsFile('/libs/ueditor1.4/ueditor.config.js');?>
<?php $this->registerJsFile('/libs/ueditor1.4/ueditor.all.js');?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <label>内容</label>
    <script id="container" name="Article[content]" type="text/plain">
        <?php echo $model->content; ?>
    </script>

    <?= $form->field($model, 'label_img') ->fileInput(['class'=>'upload_img upload-imgs','data' => 'upload_img']) ?>

    <?= $form->field($model, 'cat_id')->dropDownList($cats) ?>

    <?= $form->field($model, 'is_valid')->dropDownList(['1' => '是','0' => '否']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs('
    var ue = UE.getEditor("container");
'
, \yii\web\View::POS_END);



