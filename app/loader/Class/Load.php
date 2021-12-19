<?php
namespace Loader\Class;
use Error\Class\Error;
/**
 * 
 */
class Load
{
 public static function view(string $file,$is_star=false)
  {
     $directory  = $GLOBALS['directory'];
   if (!$is_star) {
     if (file_exists($directory->views."/".$file.".template.php")) {
     	require_once $directory->views."/".$file.".template.php";
     }
     else{
     	Error::RETURN_ERROR(404);
     	return false;
     }
   }
   else{
      if (file_exists($directory->views."/".$file)) {
      require_once $directory->views."/".$file;
     }
     else{
      Error::RETURN_ERROR(404);
      return false;
     }     
   }
     return true;
  } 
 public static function assets(string $file)
 {
 	  $directory  = $GLOBALS['directory'];
     echo $directory ->assets.$file;
     return true;
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
}