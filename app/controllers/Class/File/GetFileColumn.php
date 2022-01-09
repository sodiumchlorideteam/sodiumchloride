<?php 
namespace App\Class\File;
/**
 * 
 */
class GetFileColumn
{
  public static function Get($file_name,$file_path){
  	$file = explode(".",$file_name);
  	$extension = end($file);
  	if($extension != "csv" and $extension != "xlsx" and $extension != "xls"){
    $error = '{"unable to read":"Error with file type"}';
    return $error;
  	}
  	$directory   = $GLOBALS['directory'];
  	$py_library  = $GLOBALS['python_data'][2]; 
  	$python_file = $directory->python."files/Header/init.py";
    $sh          = shell_exec(getenv("PYTHON_CALL").' '.$python_file.' 2>&1 '.$file_name.' '.$file_path.' '.$py_library);
    if(! self::isJson($sh)){
    $error = '{"unable to read":"Error with file"}';
    return $error;
    }
    return $sh;
  }

  	public static function isJson($string) {
       json_decode($string);
       return json_last_error() === JSON_ERROR_NONE;
    }
}