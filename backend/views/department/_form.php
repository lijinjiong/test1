<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'dep_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->label("父级")->hint("请选择父级")->dropDownList(
        [0=>"最高级"]+\common\models\Department::find()->where(["parent_id"=>0])->andWhere(["!=","id",$model->id])->indexBy("id")->select("dep_name,id")->column()
    ) ?>

    <?/*= $form->field($model, 'dep_type')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
