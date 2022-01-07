<?php 
namespace Sodium\Tool\Restructure;
/**
 * 
 */
class Restructure
{
	public static $tool_command;
	public static $tool_name;

	public static function Build($tool_name,$tool_command)
	{
	  	self::$tool_command = explode("->",$tool_command);
	  	self::$tool_name    = $tool_name;
	  	return array("status"=>"success","value"=>self::RETURN_JSON());
	}

	public static function RETURN_JSON(){
    if (self::$tool_name == "linear_regression" or self::$tool_name == "polynomial_regression") {
            $labels  = explode(",",self::$tool_command[0]);
            $predict = explode(",",self::$tool_command[1]);
            $labels[0]     = str_replace(" ","",$labels[0]);
            $labels[1]     = str_replace(" ","",$labels[1]);
            $predict[0]    = str_replace(" ","",$predict[0]);
            $predict[1]    = str_replace(" ","",$predict[1]);

            $prepare_json = '{\"label-x-0\":\"'.$labels[0].'\",\"label-y-0\":\"'.$labels[1].'\",\"value-x\":\"'.$predict[0].'\",\"value-y\":\"'.$predict[1].'\"}';
    }

    elseif(self::$tool_name == "statistics"){
    	$labels     = str_replace(" ","",self::$tool_command[0]);
    	$predict    = str_replace(" ","",self::$tool_command[1]);
    	$prepare_json = '{\"method\":\"'.$labels.'\",\"label\":\"'.$predict.'\"}';
    }

    elseif(self::$tool_name == "data_visualization"){
    	$graph   = self::$tool_command[0];
     	$value   = explode("&",self::$tool_command[1]); 
    	  if(count($value) > 1){
    	  	$head_json = '{\"graph\":\"'.$graph.'\"';
    	  	$body_json = "";
    	  	for ($i=0; $i < count($value) ; $i++) { 
    	  		$params     = explode(",",$value[$i]);
    	  		$params[0]  = str_replace(" ","",$params[0]);
    	  		$params[1]  = str_replace(" ","",$params[1]);
    	  		if ($i != count($value)-1) {
    	  			$body_json .=  ',\"label-x-'.$i.'\":\"'.$params[0].'\",\"label-y-'.$i.'\":\"'.$params[1].'\"';
    	  		}
    	  		else{
    	  			$body_json .=  ',\"label-x-'.$i.'\":\"'.$params[0].'\",\"label-y-'.$i.'\":\"'.$params[1].'\"}';  
    	  		}
    	  	}
    	  	$prepare_json = $head_json.$body_json;
    	  }
    	  else{
    	  	$value        = explode(",",$value[0]);
    	  	$value[0]     = str_replace(" ","",$value[0]);
    	  	$value[1]     = str_replace(" ","",$value[1]);
    	  	$prepare_json = '{\"graph\":\"'.$graph.'\",\"label-x-0\":\"'.$value[0].'\",\"label-y-0\":\"'.$value[1].'\"}';
    	  }
    }
	return $prepare_json;
	}

}