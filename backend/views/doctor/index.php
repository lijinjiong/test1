<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            [
                'label'=>'性别',
                'attribute' => 'sex',
                'value'=>function($model){
                    return yii::$app->params['SEX'][$model->sex];
                },
                'filter' => yii::$app->params['SEX'],
            ],
//            'sex',
            'email:email',
            'id_card',
            [
                'label'=>'科室',
                'attribute'=>'dep_name',
                'value'=>function($model){
                     return isset($model->department->dep_name)?$model->department->dep_name:"";
                },
            ],
//             'department_id',
            // 'skill_disease',
            // 'id_card_front',
            // 'id_card_back',
            // 'doc_certification',
            // 'practicing_certificate',
            // 'highest_professional',
            // 'add_time:datetime',
            // 'verify_time:datetime',
            // 'status',
            // 'show_index',
            // 'mobile',
            // 'age',
            // 'province_id',
            // 'city_id',
            // 'area_id',
            // 'address',
            // 'practice_experience',
            // 'academic_post',

            ['class' => 'yii\grid\ActionColumn',
             'header'=>'操作',
            ],
        ],
         'pager' => [
            'firstPageLabel' => "首页",
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '最后一页',
        ],
    ]); ?>
</div>
