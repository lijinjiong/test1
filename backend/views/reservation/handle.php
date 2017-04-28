<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Reservation */

//$this->title = 'Update Reservation: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservation-update">

    <h1><?= Html::encode($this->title) ?></h1>

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(yii::$app->params['reservation_status']) ?>

    <div class="form-group">
        <?= Html::submitButton('处理', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
