<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TmsUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tms Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tms-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'admin_id',
            'collection_id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'mobile',
            'email:email',
            'img',
            'img_mtimes:datetime',
            'img_state',
            'background_image',
            'sex',
            'birth_year',
            'birth_month',
            'birth_day',
            'subscribe',
            'constellation',
            'province',
            'city',
            'marital_status',
            'money',
            'status',
            'gag_start_time',
            'gag_end_time',
            'remark',
            'vip',
            'interest',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
