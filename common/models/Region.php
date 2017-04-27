<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "xl_region".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $level

 */
class Region extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'xl_region';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['parent_id', 'region_type', 'agency_id'], 'integer'],
                [['region_name'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => '地区名',
            'level' => '级别',
        ];
    }

    /**
     * 获取完整的地区信息
     * @param int $regionId     region_id
     * @param string $glue        连接字符
     * @param boolean $returnArr   是否返回数组
     * @return string|array
     */
    public static function getFullRegionById($regionId, $glue = '', $returnArr = false) {
        $regionArr = [];
        if($regionId) {
            do {
                $r = static::find()->where(['id' => $regionId])->one();
                if (!$r) {
                    break;
                }
                $regionArr[$regionId] = $r->region_name;
                $regionId = $r->parent_id;
            } while ($r->region_type > 1);
        }
        $regionArr = array_reverse($regionArr, true);
        return $returnArr ? $regionArr : implode($glue, $regionArr);
    }



    /*
     * 获取省市两级数据
     */

    public static function getProvinceCity() {
        //省市区数据
        $provinces = Region::find()->where('parent_id=1')->select('id,parent_id,name')->asArray()->all();
       $citys = Region::find()->where('parent_id != 1 and region_type=2')->select('parent_id,region_name')->asArray()->all();
        foreach ($citys as $city) {
            foreach ($provinces as $k => $province) {
                if ($province['region_id'] == $city['parent_id']) {
                    $provinces[$k]['citys'][] = $city['region_name'];
                }
            }
        }
        return $provinces;
    }

    public static function getRegion($parentId=0)
    {
        $result = static::find()->where(['parent_id'=>$parentId])->asArray()->all();
        return ArrayHelper::map($result, 'id', 'name');
    }
    /*根据id找名字*/
    public static function getName($id){
        $region=self::find()->where(["id"=>$id])->one();
        if(!$region){
            return "";
        }
        return $region->name;
    }
}
