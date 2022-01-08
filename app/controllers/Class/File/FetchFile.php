<?php 
namespace App\Class\File;

class FetchFile 
{
public static function Build()
{
	$directory = $GLOBALS['directory']; 
    $json_data = file_get_contents($directory->app_data."/uploaded.json");
    if (!empty($json_data)) {
		$data_array = json_decode($json_data,true);
	}
	else{
		$data_array = Null;
	}
	$n  = count($data_array);
	return array("data"=>$data_array,"count"=>$n);
}

public static function CHANGE_FROM_BYTE($byte){
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
}