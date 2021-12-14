<?php
namespace Universe\Class;
/**
 * @return true
 */
class Universe
{
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