<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\HospitalRegion */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '医院 地区';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-region-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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

            ['class' => 'yii\grid\ActionColumn',
            "header"=>"操作"],
        ],
        'pager' => [
            'firstPageLabel' => "首页",
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '最后一页',
        ],

    ]); ?>
</div>
