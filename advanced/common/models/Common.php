<?php
    namespace common\models;
    use yii\base\Model;
    
    class Common extends Model{
        // 上传文件 图片
        public static function set_UploadFile_img($file,$child = ''){
            $maxsize = 1024*1024*10;
            $arrExt = array('jpg','jpeg','png','gif');

            if ($file['error'] == 0) {
                if ($file['size'] > $maxsize) {
                    exit('上传文件过大，请勿超过10M');
                }
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if (!in_array($ext,$arrExt)) {
                    exit('上传文件的类型不被允许');
                }

                $path = 'uploads/'.$child.'/'.date('Y-m');
                if (!file_exists($path)) {
                    mkdir($path,0777,true);
                    chmod($path,0777);
                }
                $uniname = md5(uniqid(microtime(true),true));
                $destination = $path.'/'.$uniname.'.'.$ext;
                if (@move_uploaded_file($file['tmp_name'],$destination)) {
                    return $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER['HTTP_HOST'].'/uploads/'.$child.'/'.date('Y-m').'/'.$uniname.'.'.$ext;
                } else {
                    exit('文件上传失败');
                }

            } else {
                return '';
            }
        } 

        public static function get_img($arr,$name){
            $res = [];
            foreach ($arr as $k => $v) {
                foreach ($v as $key => $value) {
                    if ($name == $key) {
                        $res[$k] = $value;
                    }
                }
            }
            return $res;
        }



    }