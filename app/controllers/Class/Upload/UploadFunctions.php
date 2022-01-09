<?php
namespace App\Class\Upload;
use Model\Class\Universal;
use  App\Class\Json\JsonHandling;
/**
 * 
 */
class UploadFunctions extends Universal
{
   use JsonHandling;
    function UploadThisFile($file,$directory){
    $file['name'] = preg_replace('/[\^£$%*@#~"();<{}:|=+¬]/',"",$file['name']);
    $file['name'] = str_replace(" ","",$file['name']);
    $file_path = $directory->uploaded.'/'.$file['name'];
    $file_path = str_replace('\\','/',$file_path);
    if(file_exists($file_path)){
     echo "file already exists";
     return false;
    }

   if (file_put_contents('uploads/'.$file['name'],file_get_contents($file['tmp_name']))) {
    
    $oldJson = json_decode(file_get_contents($directory->app_data.'/uploaded.json'),true);
    $old     = $this->__prepare__old__data__($oldJson,count($oldJson));
    $new     = $this->__preapare__new__data__(count($oldJson),$file,$file_path,parent::__gen__url__());
    $prepared_data = $this->__prepare__all__($old,$new);

     if (file_put_contents($directory->app_data.'/uploaded.json',$prepared_data)){
        return true;
     }
   }
   else{
      return false;
   }
    }
}