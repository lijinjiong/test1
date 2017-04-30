<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 12:07
 */

namespace api\models;


use yii\base\UserException;

class DoctorForm extends Doctor
{
    public function rules()
    {
        return [
            [['username','sex','mobile','bank_card','bank_name','open_bank', 'province', 'city', 'district',
                "hospital",'id_card', 'department_id', 'skill_disease'], 'required','message'=>"{attribute}不能为空"],
            [['sex', 'department_id', 'add_time', 'verify_time', 'status', 'show_index', 'mobile', 'age', 'province', 'city', 'district'], 'integer'],
            [['username', 'bank_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 25],
            [['id_card'], 'string', 'max' => 18],
            [['bank_card'], 'string', 'max' => 21],
            [['open_bank'], 'string', 'max' => 40],
            [['skill_disease', 'id_card_front', 'id_card_back', 'doc_certification', 'practicing_certificate', 'highest_professional', 'address'], 'string', 'max' => 255],
            [['practice_experience', 'academic_post'], 'string', 'max' => 1000],
        ];
    }
    public function attributeLabels()
    {
        $attribute=parent::attributeLabels();
        $attribute["province"]="省份";
        $attribute["district"]="地区";
        $attribute["city"]="城市";
        return $attribute;
    }

    /*医生加盟方法*/
    public  function addDoctor($data,$files){
        if($this->load($data,"")&&$this->validate()){

            /*处理图片*/
            /*保存*/
            if($this->save(false)){
                return true;
            }else{
                return false;
            }
        }else{
            throw new UserException(current($this->getFirstErrors()));
        }
    }
}