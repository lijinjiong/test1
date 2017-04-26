<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'img')->fileInput()->hint('请选择广告图片')->label('广告图片') ?>

    <?= $form->field($model, 'banner_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'banner_type')->dropDownList(Yii::$app->params["BANNER_TYPE"],['prompt'=>'请选择显示']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
