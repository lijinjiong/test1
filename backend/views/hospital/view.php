<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hospitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                "label"=>"地区",
                "value"=>function($model){
                    return \common\models\Region::getName($model->region_id);
                }
            ],
            [
                'label' => '医院分类',
                'attribute' => 'type',
                'value' => function ($model) {
                    return Yii::$app->params["HOSPITAL_TYPE"][$model->type];
                },
            ],
        ],
    ]) ?>

</div>
