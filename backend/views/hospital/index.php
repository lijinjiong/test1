<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospitals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hospital', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            "header"=>"序号"
            ],

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
                'filter' =>Yii::$app->params["HOSPITAL_TYPE"],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
