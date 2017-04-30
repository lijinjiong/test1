<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 15:11
 */

namespace api\models;


use yii\base\UserException;

class ReservationForm extends Reservation
{
    public function rules()
    {
        return [
            [['name', 'mobile', 'referrer', 'doc_id'], 'required'],
            [['doc_id', 'add_time', 'reservation_time'], 'integer'],
            [['name', 'referrer'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 11],
            [['note'], 'string', 'max' => 255],
        ];
    }
    public function addReservation($data){
        if($this->load($data,"")&&$this->validate()){
            $this->add_time=time();
            $this->status=1;
            return $this->save(false);
        }else{
            throw new UserException(current($this->getFirstErrors()));
        }
    }


}