<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_banner".
 *
 * @property integer $id
 * @property string $banner_img
 * @property string $banner_url
 * @property integer $banner_type
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner_img'], 'required'],
            [['banner_type'], 'integer'],
            [['banner_img', 'banner_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner_img' => '图片',
            'banner_url' => '链接地址',
            'banner_type' => '类型',
        ];
    }
}
