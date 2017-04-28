<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .hide{display: none;  }
    .botton-m{margin-bottom:20px; }
</style>
<div class="hospital-form">

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
            'options'=>['class'=>'form-control botton-m form-control-inline','prompt'=>'选择城市']
        ],
        'district'=>[
            'attribute'=>'district',
            'items'=>\common\models\Region::getRegion($model['city']),
            'options'=>['class'=>'form-control hide  form-control-inline','prompt'=>'选择县/区']
        ]
    ])->label("所在地区");?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params["HOSPITAL_TYPE"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
