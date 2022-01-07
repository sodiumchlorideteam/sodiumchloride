<?php
namespace Error\Class;
use Loader\Class\Load;
/**
 * @return error messages
 */
class Error
{
 public static function RETURN_ERROR(int $CODE,$not_load = null)
 {
 	$message = match($CODE){
    1 => "UNEXPECTED ERROR FOUND",
    2 => "SOME ERROR OCCURED",
    3 => "ERROR CAUSED BECAUSEOF MODIFIED FILES",
    204 => "EMPTY CONTENT",
    400 => "RESTRICTED",
    404 => "NOT FOUND",
    502 => "BAD GATEWAY",
    12002 => "REQUEST TIMEOUT",
    default => "SOMETHING WENT WRONG",
 	};
   if($not_load == null){
   Load::error("ErrorTemplate",$CODE);
}
 	RETURN $message;
 }

 public static function CMD_DISPLAY($message,$is_error = false,$UI=false){
   if (!$UI) {
     $message = ($is_error) ? "\033[31m {$message}\033 \e[m \n" : "\033[32m {$message}\033 \e[m \n";;
   }
   else{
      $message = ($is_error) ? "<p style='color:red;'>{$message}</p>":$message ;    
   }
   return $message;
 }
}