<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%tms_user}}".
 *
 * @property integer $id
 * @property string $admin_id
 * @property integer $collection_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $mobile
 * @property string $email
 * @property string $img
 * @property integer $img_mtimes
 * @property integer $img_state
 * @property string $background_image
 * @property integer $sex
 * @property integer $birth_year
 * @property integer $birth_month
 * @property integer $birth_day
 * @property integer $subscribe
 * @property string $constellation
 * @property string $province
 * @property string $city
 * @property string $marital_status
 * @property string $money
 * @property integer $status
 * @property string $gag_start_time
 * @property string $gag_end_time
 * @property string $remark
 * @property integer $vip
 * @property string $interest
 * @property string $created_at
 * @property string $updated_at
 */
class TmsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tms_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'collection_id', 'img_mtimes', 'img_state', 'sex', 'birth_year', 'birth_month', 'birth_day', 'subscribe', 'money', 'status', 'gag_start_time', 'gag_end_time', 'vip', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'img', 'background_image', 'constellation', 'province', 'city', 'marital_status', 'remark', 'interest'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['mobile'], 'string', 'max' => 11],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'collection_id' => 'Collection ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'img' => 'Img',
            'img_mtimes' => 'Img Mtimes',
            'img_state' => 'Img State',
            'background_image' => 'Background Image',
            'sex' => 'Sex',
            'birth_year' => 'Birth Year',
            'birth_month' => 'Birth Month',
            'birth_day' => 'Birth Day',
            'subscribe' => 'Subscribe',
            'constellation' => 'Constellation',
            'province' => 'Province',
            'city' => 'City',
            'marital_status' => 'Marital Status',
            'money' => 'Money',
            'status' => 'Status',
            'gag_start_time' => 'Gag Start Time',
            'gag_end_time' => 'Gag End Time',
            'remark' => 'Remark',
            'vip' => 'Vip',
            'interest' => 'Interest',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
