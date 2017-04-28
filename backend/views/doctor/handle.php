<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Reservation */

$this->title = '操作';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-update">

    <h1></h1>

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(yii::$app->params['DOCTOR_STATUS']) ?>

    <div class="form-group">
        <?= Html::submitButton('处理', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
