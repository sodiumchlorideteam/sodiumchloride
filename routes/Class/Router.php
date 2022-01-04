<?php
namespace Route\Class;
use Error\Class\Error;
/**
 * 
 */
class Router
{ 
 public $status_code;
 public static function GET($path ,int $call,callable $function,array $parameters = null)
 {
   if ($_SERVER['REQUEST_METHOD'] != "GET") { return false;}
    $directory   = $GLOBALS['directory']; 
    $status_code = 404;
    $requested_path  = self::PATH_BUILDER($GLOBALS['CURRENT_DIRECTORY'],$GLOBALS['REQUESTED_PATH']);
    if ($requested_path == $path) {
       $status_code = 200;
       $function();
       die();
       return true;
    }

    if ($call == 1 and $status_code == 404) {
      Error::RETURN_ERROR(404);
    }
    return false;
     }

 public static function POST($path ,int $call,callable $function,array $parameters = null)
 {
   if ($_SERVER['REQUEST_METHOD'] != "POST") { return false;}
    $directory   = $GLOBALS['directory']; 
    $status_code = 404;
    $requested_path  = self::PATH_BUILDER($GLOBALS['CURRENT_DIRECTORY'],$GLOBALS['REQUESTED_PATH']);
   
    if ($requested_path == $path) {
       $status_code = 200;
       $function();
       die();
       return true;
    }

    if ($call == 1 and $status_code == 404) {
      Error::RETURN_ERROR(404);
    }
    return false;
 }

 private static function PATH_BUILDER($curr_directory,$url)
{ 
   $url =rtrim($url,"/");
   $url = explode("/",$url);
   $n   = count($url);
   $path = "/";
   $started = false;
 
   for ($i=0; $i < $n ; $i++) { 
      if ($started == true) {
         if ($i+1 == $n) {
           $path .= $url[$i];
         }
         else{
         $path .= $url[$i]."/";
      }
      }
      if ($curr_directory == $url[$i]) {
         $started = true;
      }
      if ($started == false and $i+1 == $n) {
         $path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
         if($path=="/"){
                 return $path;
         }
         return rtrim($path,"/");
      }
     
   }
   return $path;
}

}