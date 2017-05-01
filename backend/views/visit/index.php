<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '访问统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

   <!-- <h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <!--  <?/*= Html::a('Create Visit', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'add_time:datetime',
            'ip',
            'count',
            'platform',
            [
                "label"=>"总访问量",
                "value"=>function($model){
                    return visifind()->count();
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    <table class="table">
      <th><td>总访问量</td><td>PC访问量</td><td>手机访问量</td></th>
        <tr><td>PV统计</td><td><?=Html::encode($model["pv_count"])?></td><td><?=Html::encode($model["pc_pv_count"])?></td><td><?=Html::encode(empty($model["wx_pv_count"])?0:$model["wx_pv_count"])?></td> </tr>
        <tr><td>UV统计</td><td><?=Html::encode($model["uv_count"])?></td><td><?=Html::encode($model["pc_uv_count"])?></td><td><?=Html::encode($model["wx_uv_count"])?></td> </tr>

    </table>
</div>
