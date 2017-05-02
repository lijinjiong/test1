<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 12:07
 */

namespace api\models;

use Yii;
use yii\base\UserException;
use common\help\Tool;

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
    public  function addDoctor($data,$file){
        if($this->load($data,"")&&$this->validate()){
            if (!empty($file['id_card_front'])) {
                $picture = Tool::upload($file['id_card_front'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/id_card');
                if (is_string($picture)) {
                    throw new UserException($picture);
           }
                $this->id_card_front=$picture[1];
              /*  return ["code"=>1,"path"=>$picture[1]];*/
            }else{
                throw new UserException("请上传身份证正面");
       }
            if (!empty($file['id_card_back'])) {
                $picture = Tool::upload($file['id_card_back'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/id_card');
                if (is_string($picture)) {
                    throw new UserException($picture);
                }
                $this->id_card_back=$picture[1];
                /*  return ["code"=>1,"path"=>$picture[1]];*/
            }else{
                throw new UserException("请上传身份证反面");
            }
            if (!empty($file['doc_certification'])) {
                $picture = Tool::upload($file['doc_certification'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/doc_certification');
                if (is_string($picture)) {
                    throw new UserException($picture);
                }
                $this->doc_certification=$picture[1];
                /*  return ["code"=>1,"path"=>$picture[1]];*/
            }else{
                throw new UserException("请上传医生资格证");
            }
            if (!empty($file['practicing_certificate'])) {
                $picture = Tool::upload($file['practicing_certificate'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/practicing_certificate');
                if (is_string($picture)) {
                    throw new UserException($picture);
                }
                $this->practicing_certificate=$picture[1];
                /*  return ["code"=>1,"path"=>$picture[1]];*/
            }else{
                throw new UserException("请上传医师资格证");
            }
            if (!empty($file['highest_professional'])) {
                $picture = Tool::upload($file['highest_professional'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/highest_professional');
                if (is_string($picture)) {
                    throw new UserException($picture);
                }
                $this->highest_professional=$picture[1];
                /*  return ["code"=>1,"path"=>$picture[1]];*/
            }else{
                throw new UserException("请上传最高专业职称证");
            }
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