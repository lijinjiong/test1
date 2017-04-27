<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalRegion */

$this->title = '医院城市'.$model->id;
$this->params['breadcrumbs'][] = ['label' => '医院城市', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-region-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                "label"=>"省份",
                "value"=>function($model){
                    return \common\models\Region::getName($model->province);
                }

            ],
            [
                "label"=>"城市",
                "value"=>function($model){
                    return \common\models\Region::getName($model->city);
                }

            ],
        ],
    ]) ?>

</div>
