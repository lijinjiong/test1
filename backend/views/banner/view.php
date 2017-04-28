<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */

$this->title ="广告详情".$model->id;
$this->params['breadcrumbs'][] = ['label' => '广告', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['更新', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['删除', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => '广告类型',
                'attribute' => 'banner_type',
                'value' => function ($model) {
                    return Yii::$app->params["BANNER_TYPE"][$model->banner_type];
                },
            ],
            'banner_url:url',
            [
                'format' => [
                    'image',
                ],
                'label' => '图片',
                'value' => function ($model) {
                    return $model->banner_img;
                }

            ],
        ],
    ]) ?>

</div>
