<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预约列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <!--  --><?/*= Html::a('新增预约', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mobile',
            'referrer',
            [
                'label'=>'添加时间',
                'attribute' => 'add_time',
                'format' => ['date', 'Y-m-d H:i:s'],
            ],
            [
                'label'=>'医生',
                'attribute' => 'doc_id',
                'value'=>function($model){
                  return isset($model->doctor->username)?$model->doctor->username:"未知";
                }
            ],
            [
             'attribute' => 'status',
             'filter' => yii::$app->params['reservation_status'],// 生成一个搜索框 
             'value'=>function($model){
                 return yii::$app->params['reservation_status'][$model->status];
             }
            ],
             'note',
            ['class' => 'yii\grid\ActionColumn',
             'header'=>'操作',
               'template' => ' {handle}{view}{edit} {delete} ',
                'buttons' => [
                     'handle' => function ($url, $model, $key) {
                        return Html::a('处理', ['handle'], [
                        'class' => 'btn btn-success btn-info btn-xs handle',
                        'id' => 'handle', // 按钮的id随意
                        'data-toggle' => 'modal', // 固定写法
                        'data-target' => '#operate-modal', // 等于4.1begin中设定的参数id值
                        ]
                        );
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('预览', ['view', 'id' => $key], ['class' => 'btn btn-info btn-xs', ]
                        );
                    },
                   
                    'edit' => function ($url, $model, $key) {
                        return Html::a('编辑', ['update', 'id' => $key], ['class' => 'btn btn-info btn-xs',]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('删除', ['delete', 'id' => $key],  [
                                    'class' => 'btn btn-info btn-xs',
                                    'data' => ['confirm' => '删除部门,是否继续操作？','method'=>'post']
                                ]);
                    },
                ],

                ],
        ],
    ]); ?>
</div>
<?php
use yii\bootstrap\Modal;
Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]); 
Modal::end();
use yii\helpers\Url;
// 创建
$requestUpdateUrl = Url::toRoute('handle');
$js = <<<JS
// 创建操作
$('.handle').on('click', function () {
    $('.modal-title').html('操作');
    $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
        function (data) {
            $('.modal-body').html(data);
        }  
    );
});
JS;
$this->registerJs($js);
?>