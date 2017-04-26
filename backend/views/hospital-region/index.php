<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\HospitalRegion */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospital Regions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-region-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hospital Region', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'region_id',
            'region_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
