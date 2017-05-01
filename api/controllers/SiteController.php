<?php
namespace api\controllers;



use api\models\Doctor;
use common\models\Banner;
use common\models\Department;

class SiteController extends ControllerBase {

/*首页接口*/

    public function actionIndex(){
        $banner_type=\Yii::$app->request->post("banner_type",1);
        $banner_list=Banner::getIndexBanner();
        return [
            'code'=>1,
            'message'=>"",
            "carouselList"=>$banner_list,
            //'recommend'=>Doctor::findIndexDoctor(4),
            'doctorList'=>Doctor::findIndexDoctor(),
        ];

    }
}