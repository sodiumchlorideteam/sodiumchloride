<?php
namespace Universe\Class;
/**
 * @return true
 */
class Universe
{
    public static function GET_ROOT($dir){
     $dir    = rtrim($dir,DIRECTORY_SEPARATOR);
     $params = explode(DIRECTORY_SEPARATOR,$dir);
     $curr_dir = end($params);
     $curr_dir = rtrim($curr_dir,"/");
     return $curr_dir;
    }

	public static function CLEAN_URL(string $url)
	{
		   $url    = filter_var($url, FILTER_SANITIZE_URL);
           $url    = ltrim($url, '/');
           $url    = rtrim($url, '/');
           return $url; 
	}
    
    public static function EMPTY_OR_NULL($given){
    if (!isset($given) or empty($given)) {
     return true;
     }
     return false;
    }
    
    Public static function is_json($string){
     json_decode($string);
     return (json_last_error() == JSON_ERROR_NONE);
    }
}