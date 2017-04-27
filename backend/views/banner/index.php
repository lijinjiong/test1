<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增广告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => '序号'
            ],
            ['attribute' =>'id',
                'filter' =>false,
            ],
            /*   'banner_img',*/
            [
                'format' => [
                    'image',
                    [
                        'height' => 50,
                        'width' => 100
                    ]
                ],
                'label' => '图片',
                'value' => function ($model) {
                    return $model->banner_img;
                }

            ],
            'banner_url:url',
            [
                'label' => '广告类型',
                'attribute' => 'banner_type',
                'value' => function ($model) {
                    return Yii::$app->params["BANNER_TYPE"][$model->banner_type];
                },
                'filter' =>Yii::$app->params["BANNER_TYPE"],
            ],

            ['class' => 'yii\grid\ActionColumn',
                "header" => "操作"
            ],
        ],
    ]); ?>

</div>
