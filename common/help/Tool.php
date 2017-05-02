<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/2 0002
 * Time: 上午 11:01
 */

namespace common\help;


class Tool
{
    /*
        * 图片上传（单张）
        * $head 为后台web目录  其他端口调用得传  Yii::getAlias('@backend') . "/web/"
  */
    /*eg
   $file = $_FILES;
       if (!empty($file['picture'])) {
           $picture = Tool::upload($file['picture'], $head=Yii::getAlias('@backend') . "/web/",$path = 'img/doctor/img_head', );
           if (is_string($picture)) {
              throw new UserException($picture)
           }
         return ["code"=>1,"path"=>$picture[1]];
       }else{
          throw new UserException(未获取到图片");
       }
   */
    public static function upload($name, $head = "",$path = 'img/doctor', $file_arr = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'GIF', 'PNG') )
    {
        //设置上传路径，
        //首先生成新的文件夹路径

        $save_path=$head . $path;
        if (!file_exists( $save_path)) {//文件夹不存在，先生成文件夹
            mkdir($save_path);
        }
        //1、检测文件的错误信息，如果是0 就允许上传(保存)
        $errs = $name['error'];

        if ($errs > 0) {
            if ($errs == 1) {
                return '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。';
            } elseif ($errs == 2) {
                return '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 ';
            } elseif ($errs == 3) {
                return '文件只有部分被上传。';
            } elseif ($errs == 4) {
                return '没有文件上传';
            } elseif ($errs >= 5) {
                return '其他错误';
            }
        }
        //2、检测文件的类型,是否是我们需要的(png、gif、jpg)

        $style = pathinfo($name['name'], PATHINFO_EXTENSION);
        if (!in_array($style, $file_arr)) {
            return '上传的文件类型不符';
        }
        $file_name = date('YmdHis', time()) . time() . mt_rand(1000, 9999) . '.' . $style;
        if (is_uploaded_file($name['tmp_name'])) {
            $imgName = '/' . $path  . "/" . $file_name;
            move_uploaded_file($name['tmp_name'],  $save_path . "/" . $file_name);
        } else {
            return "文件上传失败！";
        }

        return ['上传成功', $imgName];
    }
    /**
     * 图片上传（单张） input name的名字为数组形式
     * $head 项目根目录
     */



}