<?php 
namespace Sodium\Tool\Verification;
use Error\Class\Error;
/**
 * 
 */
class ToolCommand
{
 private $command;
 private $tool_name;

 public  function START($tool_name,$tool_command){
 $command             = strtolower($tool_command);
 $this->command       = $command = explode('->',$command);
 $count               = count($command);
 $this->tool_name     = $tool_name;
 

 $validate            = $this->VALIDATE($count);
 if ($validate['status'] == 'failed') {
 	return $validate;
 }
 $input_validate      = $this->INPUT_VALIDATE();
 return $input_validate;
 }
 
 public function VALIDATE($count){
  if ($count != 2  ){
     return array("status"=>"failed","message"=>"tool command not found");
   }
  if($this->tool_name == "linear_regression" or $this->tool_name == "polynomial_regression"){
  	if (empty($this->command[0]) or empty($this->command[1])) {
  	return array("status"=>"failed","message"=>"Empty values given");		
  	}
    $cmd = explode(",",$this->command[0]);
    if (count($cmd) != 2) {
      return array("status"=>"failed","message"=>"tool command not found");   
    }
    if (empty($cmd[0]) or empty($cmd[1])) {
  	 return array("status"=>"failed","message"=>"Empty values given");   
    }
  }
  elseif($this->tool_name == "statistics"){
      $Methods = array('mean','median','mode','percentile','std_deviation','variance');
      $Given   = strtolower(str_replace(' ','',$this->command[0]));
     
      if (!in_array($Given,$Methods)) {
        return array("status"=>"failed","message"=>"Given method not available");   
      }  	
  }
  elseif ($this->tool_name == "data_visualization") {
  $Graphs = array('line','line_markers','line_fill','line_fill_markers','pie','scatter','bar','stacked_bar','horizontal_bar','histogram');
  $Given   =  strtolower(str_replace(' ','',$this->command[0]));
      
      if (!in_array($Given,$Graphs)) {
        return array("status"=>"failed","message"=>"Given graph type not available");
      } 
  }
  return array("status"=>"success");
 }


public function INPUT_VALIDATE(){
	$error = "can't read given prediction value";
	$labels  = ($this->tool_name == "statistics" or $this->tool_name == "data_visualization")  ? $this->command[0] : explode(',',$this->command[0]);
  $predict = ($this->tool_name == "statistics" or $this->tool_name == "data_visualization")  ? $this->command[1] : explode(',',$this->command[1]);

    if ($this->tool_name == "linear_regression" or $this->tool_name == "polynomial_regression") {
    	if ((is_numeric($predict[0]) and is_numeric($predict[1]) or (!is_numeric($predict[0]) and !is_numeric($predict[1])) or ($predict[0] != "?" and $predict[1] != "?") ) or count($predict) != 2 ){
        	 return array("status"=>"failed","message"=>$error);     		
    	}
    }

    if (!$this->BAD_CHAR($labels) or !$this->BAD_CHAR($predict)) {
        return array("status"=>"failed","message"=>"Unallowed character found !");
    }
    $LENGTH_CHECK   = $this->LENGTH_CHECK($labels);
    if ($LENGTH_CHECK['status'] == 'failed') {
        return $LENGTH_CHECK;
    }
    $PREDICT_CHECK  = $this->LENGTH_CHECK($predict);
    return $PREDICT_CHECK;
}


public  function BAD_CHAR($given){
   if (gettype($given) == "string") {
        if (preg_match('/[\^£$%*#~"();<{}:|=+¬]/',$given) or preg_match("/'/",$given)) {
     		 return false; 
     	}
    }
    elseif(gettype($given) == "array"){
         	foreach ($given as $val){
         		if(preg_match('/[\^£$%*&#~"();<{}:|=+¬]/',$val) or preg_match("/'/",$val)){
     		         return false; 
         		}
         	}
    }
    return true;
 }

public function LENGTH_CHECK($given){
 if ($this->tool_name == "linear_regression" or $this->tool_name == "polynomial_regression") {
 	  if (count($given) != 2 or empty($given[0]) or empty($given[1])) {
      return array("status"=>"failed","message"=>"argument error");
 	  }
 }
 elseif($this->tool_name == "data_visualization"){
 	$cmd = explode('&',$this->command[1]);
    
    if(count($cmd) > 1){
    foreach ($cmd as $val) {
    	$brk_val =  explode(",",$val);
    	if (count($brk_val) != 2) {
 	  	return array("status"=>"failed","message"=>"argument error");
    	}
    	foreach ($brk_val as $brkd_val_only) {
     	if(empty($brkd_val_only)){
 	  	return array("status"=>"failed","message"=>"Empty values given");
    	}   		
    	}
    }

   }
   elseif(count($cmd) == 1){
     $brk_val =  explode(",",$cmd[0]);

    	if (count($brk_val) != 2) {
 	  	return array("status"=>"failed","message"=>"argument error");
    	}

    	foreach ($brk_val as $brkd_val_only) {
     	if(empty($brkd_val_only)){
 	  	return array("status"=>"failed","message"=>"Empty values given");
    	}   		
    	}
   }
 }
 return array("status"=>"success");;
}


}