<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HospitalRegion */

$this->title = '新建医院地区';
$this->params['breadcrumbs'][] = ['label' => '医院地区', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
