<?php
namespace Route\Class;
use Universe\Class\Universe;
use Error\Class\Error;
/**
 * 
 */
class Router
{ 
 public $status_code;
 public static function GET($path ,int $call,callable $function,array $parameters = null)
 {

    $directory   = $GLOBALS['directory'];
    $root        = $GLOBALS['root'];
    $status_code = 404;
    $path = rtrim($root.$path,"/");

    if ($parameters != null) {
   for ($i=0; $i < count($parameters); $i++) { 
      if (isset($_GET[$parameters[$i]])) {
       $path .= "&{$parameters[$i]}={$_GET[$parameters[$i]]}";
    }
    }
 }
    if ($GLOBALS['REQUESTED_PATH'] == $path) {
       $function(); 
       $status_code = 200;
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
    $directory = $GLOBALS['directory'];
    $root        = $GLOBALS['root'];
    $status_code = 404;
    $path = rtrim($root.$path,"/");

    if ($GLOBALS['REQUESTED_PATH'] == $path) {
       $status_code = 200;
    if ($parameters != null) {
       for ($i=0; $i < count($parameters); $i++) { 
          if (Universe::EMPTY_OR_NULL($parameters[$i])){
             ECHO '<p style = "color:red;">'.Error::RETURN_ERROR(204,"No load").'</p>';
             die();
             return false;
          }
       }
    }
       $function();
       die();
       return true;   
    }
    if ($call == 1 and $status_code == 404) {
      Error::RETURN_ERROR(404);
    }
    return false;
 }
}