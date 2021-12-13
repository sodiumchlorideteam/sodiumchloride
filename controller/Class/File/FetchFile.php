<?php 
namespace App\Class\File;
use Model\Inbuilt\Store;

class FetchFile 
{
public static function __init__()
{
	$directory = $GLOBALS['directory']; 
    $store     = store::__init__();
	self::__store__json__($directory,$store);
	$data_array = $store ->uploaded_json_data_as_array;
	$n  = count($data_array);
	return array($data_array,$n);
}
public static function __store__json__($directory,$store)
{
	$json_data = file_get_contents($directory->model."/uploaded.json");
	if (!empty($json_data)) {
		$store ->uploaded_json_data_as_array = json_decode($json_data,true);
		return true;
	}
	return false;
}
}