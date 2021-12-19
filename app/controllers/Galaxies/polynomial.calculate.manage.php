<?php 
use App\Class\Lab\Calculate;
/**
 * 
 */
$response = Calculate::calculate("polynomial");
/**
 * 
 */
App\Class\SupportingFunctions::RANKWARNING_ERROR_OR_NOT($response);
/**
 * 
 */
$decode_json       = json_decode($response,true);
/**
 * 
 */
$plot              = base64_encode(file_get_contents($directory ->plots.'/'.$decode_json['plot path']));
/**
 * 
 */
App\Class\Lab\Output\Display::display("polynomial",$decode_json,$plot,$decode_json['plot path']);
?>