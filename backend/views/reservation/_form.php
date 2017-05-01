<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referrer')->textInput(['maxlength' => true]) ?>
<<<<<<< HEAD

    <?= $form->field($model, 'doc_id')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params["RESERVATION_STATUS"]) ?>
=======
    <div class="form-group">
        <label >医生</label>
        <div class="form-control" ><?=$model->doctor->username?></div>
    </div>
   <!-- --><?/*= $form->field($model, 'doc_id')->textInput() */?>
    <?= $form->field($model, 'status')->textInput() ?>
>>>>>>> ljj
    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

   <!-- --><?/*= $form->field($model, 'add_time')->textInput() */?>
    <div class="form-group">
        <label >添加时间</label>
        <div class="form-control" ><?=Yii::$app->formatter->asDate($model->add_time, 'yyyy-MM-dd H:i:s');?></div>
    </div>
   <!-- --><?/*= $form->field($model, 'reservation_time')->textInput() */?>
    <?= $form->field($model, 'reservation_time')->widget(\kartik\datetime\DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,     d
            'todayHighlight' => true,
        ]
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
