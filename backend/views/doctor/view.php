<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

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
            'username',
            'sex',
            'email:email',
            'id_card',
            'bank_card',
            'bank_name',
            'open_bank',
            'department_id',
            'skill_disease',
            'id_card_front',
            'id_card_back',
            'doc_certification',
            'practicing_certificate',
            'highest_professional',
            'add_time:datetime',
            'verify_time:datetime',
            'status',
            'show_index',
            'mobile',
            'age',
            'province_id',
            'city_id',
            'area_id',
            'address',
            'practice_experience',
            'academic_post',
        ],
    ]) ?>

</div>
