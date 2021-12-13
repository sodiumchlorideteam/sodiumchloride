<?php
namespace Loader\Class;
use Error\Class\Error;
/**
 * 
 */
class Load
{
 public static function view(string $file)
  {
     $directory  = $GLOBALS['directory'];
     if (file_exists($directory->view."/".$file.".template.php")) {
     	require_once $directory->view."/".$file.".template.php";
     }
     else{
     	Error::RETURN_ERROR(404);
     	return false;
     }
     return true;
  } 
 public static function stars(string $file){
 	 $directory  = $GLOBALS['directory'];
     $stars      = $directory ->stars;
     if (file_exists($stars.$file)) {
     	require_once $stars.$file;
     	return true;
     }
     else{
     	Error::RETURN_ERROR(404);
     	return false;
     }
 }
 public static function css(string $file)
 {
 	 $directory  = $GLOBALS['directory'];
     if (file_exists($directory ->assets."css/".$file)) {
     	require_once $directory ->assets."css/".$file;
        return true;
     }
     else{
     	Error::RETURN_ERROR(404);
     	return false;
     }
 }
 public static function js(string $file)
 {
 	 $directory  = $GLOBALS['directory'];
     if (file_exists($directory ->assets."js/".$file)) {
     	require_once $directory ->assets."js/".$file;
     	return true;
     }
     else{
     	Error::RETURN_ERROR(404);
     	return false;
     }
 }
  public static function images(string $file)
 {
    $directory  = $GLOBALS['directory'];
    $protocal   = $GLOBALS['protocal'];
    $host       = $GLOBALS['host'];
     if (file_exists($directory ->assets."images/".$file)) {
      $image = base64_encode(file_get_contents($directory ->assets."images/".$file));
      echo $image;
      return true;
     }
     else{
      Error::RETURN_ERROR(404);
      return false;
     }
 }

  public static function controller(string $file)
  {
     $directory  = $GLOBALS['directory'];
     if (file_exists($directory->controller."/".$file.".manage.php")) {
        require_once $directory->controller."/".$file.".manage.php";
     }
     else{
        Error::RETURN_ERROR(404);
        return false;
     }
     return true;
  } 

  public static function error(string $file,int $code)
  {
     $directory  = $GLOBALS['directory'];
     if (file_exists($directory->error."/".$file.".php")) {
        require_once $directory->error."/".$file.".php";
     }
     else{
        Error::RETURN_ERROR(404);
        return false;
     }
     return true;
  }

}