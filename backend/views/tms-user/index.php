<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TmsUserSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tms Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tms-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tms User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'admin_id',
            'collection_id',
            'username',
            'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             'mobile',
             'email:email',
            // 'img',
            // 'img_mtimes:datetime',
            // 'img_state',
            // 'background_image',
            // 'sex',
            // 'birth_year',
            // 'birth_month',
            // 'birth_day',
            // 'subscribe',
            // 'constellation',
            // 'province',
            // 'city',
            // 'marital_status',
            // 'money',
            // 'status',
            // 'gag_start_time',
            // 'gag_end_time',
            // 'remark',
            // 'vip',
            // 'interest',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pager' => [
        'firstPageLabel' => "首页",
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'lastPageLabel' => '最后一页',
    ],
    ]); ?>
    

</div>
