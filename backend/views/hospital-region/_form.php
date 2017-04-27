<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\HospitalRegion */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .hide{display: none;  }
    .botton-m{margin-bottom:20px; }
</style>
<div class="hospital-region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->widget(\chenkby\region\Region::className(),[
        'model'=>$model,
        'url'=> \yii\helpers\Url::toRoute(['get-region']),
        'province'=>[
            'attribute'=>'province',
            'items'=>\common\models\Region::getRegion(),
            'options'=>['class'=>'form-control botton-m form-control-inline','prompt'=>'选择省份']
        ],
        'city'=>[
            'attribute'=>'city',
            'items'=>\common\models\Region::getRegion($model['province']),
            'options'=>['class'=>'form-control form-control-inline','prompt'=>'选择城市']
        ],
        'district'=>[
            'attribute'=>'district',
            'items'=>\common\models\Region::getRegion($model['city']),
            'options'=>['class'=>'form-control hide  form-control-inline','prompt'=>'选择县/区']
        ]
    ]);?>
    <div class="form-group">
        &nbsp;
        <div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
