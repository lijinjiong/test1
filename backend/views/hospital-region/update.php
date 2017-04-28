<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalRegion */

$this->title = '更新医院城市: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '医院城市', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="hospital-region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
