<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_reservation".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $referrer
 * @property integer $doc_id
 * @property string $note
 * @property integer $add_time
 * @property integer $reservation_time
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'referrer', 'doc_id', 'add_time','status'], 'required'],
            [['doc_id', 'add_time', 'reservation_time'], 'integer'],
            [['name', 'referrer'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 11],
            [['note'], 'string', 'max' => 255],
        ];
    }
/*
 * 获取医生姓名
 */
public function getDoctor(){
     return $this->hasOne(Doctor::className(), ['id' => 'doc_id']);
}

/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '预约姓名',
            'name' => '预约姓名',
            'mobile' => '预约手机号',
            'referrer' => '推荐人',
            'doc_id' => '医生id',
            'note' => '备注',
            'add_time' => '添加时间',
            'reservation_time' => '预约时间',
            'status'=>'处理状态'
        ];
    }
}
