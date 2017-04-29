<?php
namespace api\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\auth\CompositeAuth;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;


class ControllerBase extends Controller
{
    public function init()
    {
        parent::init();
     }

    // 默认禁止访问所有方法
    public function rules()
    {
        return [
            [
                'allow' => true,
            ]
        ];
    }

    public function behaviors()
    {
        $behaviors = [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],
            'rateLimiter' => [
                'class' => RateLimiter::className(),
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->rules()
            ],
        ];
        return $behaviors;
    }
    /* 把数组中的空值转成“” 数字转成字符串
     */

    public static function doSwitch($arr)
    {
        $data = array();
        if (is_array($arr)) {
            foreach ($arr as $k => $v) {
                if (is_array($v)) {
                    $data[$k] = self::doSwitch($v);
                } else if (is_null($v)) {
                    $data[$k] = "";
                } else if (is_numeric($v)) {
                    $data[$k] = (string) $v;
                } else {
                    $data[$k] = $v;
                }
            }
        };
        return $data;
    }
    /* 预格式打印 */

    public static function pre($str)
    {
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
    }
}
