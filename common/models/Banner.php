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
    public $img;
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
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
    public static function dropDown ($column, $value = null) {
        $dropDownList = [
            'banner_type'=>Yii::$app->params["BANNER_TYPE"]
        ];
        //根据具体值显示对应的值
        if ($value !== null)
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column][$value] : false;
        //返回关联数组，用户下拉的filter实现
        else
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column] : false;
    }
}
