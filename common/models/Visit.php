<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_visit".
 *
 * @property integer $id
 * @property integer $add_time
 * @property string $ip
 * @property integer $count
 * @property integer $platform
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_time', 'count', 'platform'], 'integer'],
            [['ip', 'platform'], 'required'],
            [['ip'], 'string', 'max' => 20],
        ];
    }


    public static function add($ip,$platform){
        $visit=self::find()->where(["ip"=>$ip,"platform"=>(int)$platform])->andWhere(["add_time"=>strtotime(date("Y-m-d"))])->one();
        if($visit){
            $visit->count+=1;
        }else{
            $visit=new Visit();
            $visit->ip=$ip;
            $visit->platform=$platform;
            $visit->count=1;
            $visit->add_time=strtotime(date("Y-m-d"));

        }
        return $visit->save(false);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'add_time' => '添加时间',
            'ip' => 'IP',
            'count' => '本日访问次数',
            'platform' => '平台来源',//1PC 2手机 3爱心筹
        ];
    }
}
