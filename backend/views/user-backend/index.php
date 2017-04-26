<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Backends';
$this->params['breadcrumbs'][] = $this->title;
?>
    
<div class="user-backend-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加新用户', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'email:email',
//             'created_at',
              [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'format' => 'raw',
//                'value' => function($model){                    
//                    return date('Y-m-d H:i:s', $model->created_at);
//                },
                'filter' => Html::input(['class' => 'required','id' => 'start_time','style' => 'width:80px']),
                'options'=> ['width'=> '12%']
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php

$script = <<<JS
$(function(){
    $('#start_time').datepicker({
        autoclose: true,
        format : 'yyyy-mm-dd',
        'language' : 'zh-CN',
    });
   
});


JS;
$this->registerJs($script);
?>