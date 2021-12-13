<?php 
namespace App\Class\Command\Dv;
/**
 * 
 */
class Dv
{
  public static function make($command)
  {
  	$breaked_command = mb_split('->',$command);
  	//check length
  	if(count($breaked_command) != 2){echo self::DISPLAY_ERROR("Invalid command");die();}
  	$graph           = $breaked_command[0];
  	$values          = $breaked_command[1];

    $multiple_values = mb_split("&",$values);
  	//check multiple given values or not
  	if (count($multiple_values) != 1) {
  		$values = $multiple_values;
  	}

  	//check for unallowed characters 
  	self::BAD_CHAR($graph);
  	self::BAD_CHAR($values);
    
    //check length and detect empty value
    self::LENGTH_CHECK($values);
  	//check graph availability
  	self::GRAPH_AVAILABILITY($graph);

  	//result in json
  	$result = self::RETURN_JSON($graph,$values);
  	return $result;
  }
  public static function DISPLAY_ERROR($err){
 	$errorMessage = '<p style="color:red;">'.$err.'</p>';
 	return $errorMessage;
  }

  public static function BAD_CHAR($value){
   
   if (gettype($value)=="array"){
   	foreach ($value as $val){
   	if(preg_match('/[\^£$%*@#~"();<{}:|=+¬]/',$val) or preg_match("/'/",$val)){
   		echo self::DISPLAY_ERROR("unallowed characters found !");
   		die();
     }
   }
  }
   else{
   	if(preg_match('/[\^£$%*@#~"();<{}:|=+¬]/',$value) or preg_match("/'/",$value)){echo self::DISPLAY_ERROR("unallowed characters found !");die();}}
   	return true;
  }


  public static function LENGTH_CHECK($value){
  if (gettype($value) == "array") {
  	foreach ($value as $val) {
  		$val              = str_replace(' ','',$val);
  		$breaked_value    = explode(",",$val);

  		if (count($breaked_value) != 2 or empty($breaked_value[0]) or empty($breaked_value[1])) {
    		echo self::DISPLAY_ERROR("can't read given value");
   		    die(); 			
  		}
  	}
  } else {
  	  $value         = str_replace(' ','',$value);
  		$breaked_value = explode(",",$value);

  		if (count($breaked_value) != 2 or empty($breaked_value[0]) or empty($breaked_value[1])) {
    		echo self::DISPLAY_ERROR("can't read given value");
   		    die(); 			
  		}
  }
  return true;
  }

  public static function GRAPH_AVAILABILITY($graph){
  $available_graphs = array('line','line_markers','line_fill','line_fill_markers','pie','scatter','bar','stacked_bar','horizontal_bar','histogram');
  $given_graph = strtolower($graph);
  
  if (!in_array($given_graph,$available_graphs)) {echo self::DISPLAY_ERROR("Given graph type not available");die();}
  return true;
  }
  
  public static function RETURN_JSON($graph,$value){
  if(gettype($value) == 'array'){
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
  	$value        = explode(",",$value);
    $value[0]     = str_replace(" ","",$value[0]);
    $value[1]     = str_replace(" ","",$value[1]);

  	$prepare_json = '{\"graph\":\"'.$graph.'\",\"label-x-0\":\"'.$value[0].'\",\"label-y-0\":\"'.$value[1].'\"}';
  }
return $prepare_json;
  }


}