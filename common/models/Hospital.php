<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_hospital".
 *
 * @property integer $id
 * @property integer $region_id
 * @property string $name
 * @property string $type
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'name'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => '医院地区id',
            'name' => '医院名称',
            'type' => '医院级别',
        ];
    }
}
