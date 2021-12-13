<?php 
namespace Model\Class;

class Universal
{
protected function __get__this__url($server,$path)
{
	$protocal = !empty($_SERVER['HTTPS']) ? "https://" : "http://" ;
    $url      = $protocal.$server.$path;
    return $url;
}
protected function __gen__url__(){
 $str="qwertyuiopasdfghjklzxcvbnm";
 $str = $str.strtoupper($str)."1234567890";
 $url=str_shuffle(substr(str_shuffle(str_repeat(str_shuffle($str),1)),56)).time();
 return $url;
}

public static function __change__byte($byte){
    if ($byte < 1048576) {
       $normalized = number_format(($byte/1024),2,'.','');  
       $normalized = $normalized.' KB';
    }
    elseif($byte > 1048576 and $byte < 1073741824){
       $normalized = number_format(($byte/1048576),2,'.','');  
       $normalized = $normalized.' MB';
    }
    elseif($byte > 1073741824){
       $normalized = number_format(($byte/1073741824),2,'.','');  
       $normalized = $normalized.' GB';
    }
return $normalized;
}
public static function EmptyOrNull($given){
  if (!isset($given) or empty($given)) {
     return true;
  }
  return false;
}
}