<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TmsUser */

$this->title = 'Create Tms User';
$this->params['breadcrumbs'][] = ['label' => 'Tms Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tms-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
