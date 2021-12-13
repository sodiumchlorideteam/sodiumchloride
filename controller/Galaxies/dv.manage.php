<?php 
use App\Class\Lab\Calculate;
/**
 * 
 */
$response = Calculate::calculate("data-visualization");
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
$plot_path         = $directory ->plots.'/'.$decode_json['plot path'];
/**
 * 
 */
$plot              = base64_encode(file_get_contents($plot_path));
/**
 * 
 */
App\Class\Lab\Output\Display::display("data-visualization",$decode_json,$plot,$decode_json['plot path']);
?>