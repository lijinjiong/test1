<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_doctor".
 *
 * @property integer $id
 * @property string $username
 * @property integer $sex
 * @property string $email
 * @property string $id_card
 * @property string $bank_card
 * @property string $bank_name
 * @property string $open_bank
 * @property integer $department_id
 * @property string $skill_disease
 * @property string $id_card_front
 * @property string $id_card_back
 * @property string $doc_certification
 * @property string $practicing_certificate
 * @property string $highest_professional
 * @property integer $add_time
 * @property integer $verify_time
 * @property integer $status
 * @property integer $show_index
 * @property integer $mobile
 * @property integer $age
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property string $address
 * @property string $practice_experience
 * @property string $academic_post
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'id_card', 'department_id', 'skill_disease', 'add_time', 'status'], 'required'],
            [['sex', 'department_id', 'add_time', 'verify_time', 'status', 'show_index', 'mobile', 'age', 'province_id', 'city_id', 'area_id'], 'integer'],
            [['username', 'bank_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 25],
            [['id_card'], 'string', 'max' => 18],
            [['bank_card'], 'string', 'max' => 21],
            [['open_bank'], 'string', 'max' => 40],
            [['skill_disease', 'id_card_front', 'id_card_back', 'doc_certification', 'practicing_certificate', 'highest_professional', 'address'], 'string', 'max' => 255],
            [['practice_experience', 'academic_post'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'sex' => '1男2女',
            'email' => 'Email',
            'id_card' => '身份证号',
            'bank_card' => '银行卡号',
            'bank_name' => '账户名',
            'open_bank' => '开户行',
            'department_id' => '所在科室',
            'skill_disease' => '擅长疾病',
            'id_card_front' => '身份证正面',
            'id_card_back' => '身份证反面',
            'doc_certification' => '医师资格证',
            'practicing_certificate' => '医师执业证',
            'highest_professional' => '最高职称',
            'add_time' => '添加时间',
            'verify_time' => '审核时间',
            'status' => '0待审核1 审核通过2 不通过',
            'show_index' => '0不显示1显示',
            'mobile' => '手机号',
            'age' => '年龄',
            'province_id' => '省id',
            'city_id' => '城市id',
            'area_id' => '区id',
            'address' => '街道地址',
            'practice_experience' => '执业经历',
            'academic_post' => '学术任职',
            'hospital_id'=>'医院ID',
            "hospital_name"=>"医院名称",
        ];
    }
}
