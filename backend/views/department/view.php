<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Department */

$this->title = "科室".$model->dep_name;
$this->params['breadcrumbs'][] = ['label' => '科室', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dep_name',
            [
                'label'=>"父级名称",
                'value'=>function($model){
                    $parent=$model->parent;
                    return empty($parent)?"":$parent->dep_name;
                }
            ],
            [
                "attribute"=> 'dep_type',
                'value'=>function($model){return Yii::$app->params["DEPARTMENT_TYPE"][$model->dep_type];},
            ],
        ],
    ]) ?>

</div>
