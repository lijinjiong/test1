<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预约管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Reservation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header'=>"序号"
            ],

            [
                "attribute"=>'id',
                'format' =>[
                    'raw',
                    [
                        'width' => 100
                    ]
                ],
            ],
            'name',
            'mobile',
            'referrer',
            'doc_id',
             'note',
            [
                "attribute"=>'status',
                "value"=>function($model){
                   return Yii::$app->params["RESERVATION_STATUS"][$model->status];
                },
                'filter'=>Yii::$app->params["RESERVATION_STATUS"],
            ],

            [
                "attribute"=>'add_time',
                'format' => ['date', 'Y-m-d H:i:s'],
            ],
            // 'reservation_time:datetime',

            ['class' => 'yii\grid\ActionColumn',
            "header"=>"操作"
            ],
        ],
    ]); ?>
</div>
