<?php 
use App\Class\Lab\Calculate;
/**
 * 
 */
$response = Calculate::calculate("statistics");
/**
 * 
 */
App\Class\SupportingFunctions::RANKWARNING_ERROR_OR_NOT($response);
/**
 * 
 */
App\Class\Lab\Output\Display::display("statistics",$response,null);
?>