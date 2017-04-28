<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->title = '修改医院: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '医院', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="hospital-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
