<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_department".
 *
 * @property integer $id
 * @property string $dep_name
 * @property integer $parent_id
 * @property integer $dep_type
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dep_name', 'dep_type'], 'required'],
            [['id', 'parent_id', 'dep_type'], 'integer'],
            [['dep_name'], 'string', 'max' => 20],
        ];
    }

    public function getParent(){
       return $this->hasOne(Department::className(),["id"=>"parent_id"]);
    }

    public static function getFullDepartment(){
        $par=self::find()->select("id,dep_name,parent_id")->indexBy("id")->asArray()->all();
        $data=[];
        foreach($par as $k =>$v){
            if($v["parent_id"]==0){
                $data[]=&$par[$k];
            }else{
                $par[$v["parent_id"]]["child"][]=$v;
            }
        }

        return $data;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dep_name' => '科室名称',
            'parent_id' => '父级id',
            'dep_type' => '科室级别',
        ];
    }
}
