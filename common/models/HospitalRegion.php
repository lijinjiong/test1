<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_hospital_region".
 *
 * @property integer $id
 * @property integer $region_id
 * @property string $region_name
 */
class HospitalRegion extends \yii\db\ActiveRecord
{
    public $district;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_hospital_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [["province", 'city'], 'required',],
            [["province", 'city'], 'integer'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province' => '省份',
            'city' => '城市',
        ];
    }
}
