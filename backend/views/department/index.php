<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '科室';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建科室', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            "header"=>"序号"
            ],

            'dep_name',
            /*'parent_id',*/
            [
              'label'=>"父级名称",
                'value'=>function($model){
                    $parent=$model->parent;
                    return empty($parent)?"":$parent->dep_name;
                }
            ],
           /* 'dep_type',*/
            [
                "attribute"=> 'dep_type',
                'value'=>function($model){return Yii::$app->params["DEPARTMENT_TYPE"][$model->dep_type];},
                'filter' =>Yii::$app->params["DEPARTMENT_TYPE"],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
