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
            [['region_id', 'region_name'], 'required'],
            [['region_id'], 'integer'],
            [['region_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'region_name' => 'Region Name',
        ];
    }
}
