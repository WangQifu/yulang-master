<?php

namespace app\index\controller;

use think\Controller;
use think\view\driver\Think;

class Upload extends Common
{
    public function uploadify(){
        $file = $file = request()->file('myfile');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH.'public'.DS.'upload/');

            if($info){
                $data = $info->getSaveName(); //文件路径
            }else{
                $data = '文件上传失败啦！';
            }
            return $data; //直接返回，不要封住成json
        }
    }
    public function upload()
    {
        $files = request()->file('file');//TP5自带接受文件的方法
        if($files){
            $info = $files->move(ROOT_PATH . 'public' . DS . 'upload'); //把它移入到指点目录
            if($info){
                return json_encode($info->getSaveName());//如果上传成功返回json类型的图片地址（适用多图）
            }else{
                echo $files->getError();
            }
        }
    }
   
}
