<?php 
namespace App\Class\Command;
/**
 * 
 */
class UnderstandCommand
{
public static  function __build__($command,$from){
  $command = strtolower($command);
  $command = explode('->',$command);
  $count   = count($command);
  #validate
  $state   = self::__validate__($command,$from,$count);
 	if($state[0] == false){
          echo self::__dis_err__($state[1]);
          return false;
 		}
 
  #set varaibles
  $labels  = ($from == "statistics")  ? $command[0] : explode(',',$command[0]);
  $predict = ($from == "statistics")  ? $command[1] : explode(',',$command[1]);

  #check for unallowed charcters
    if (self::__Bad__Char__($labels,$from) or self::__Bad__Char__($predict,$from)) {
       	echo self::__dis_err__('unallowed characters found !');
       	return false;
   }
 
 #validate input
   if (self::__input__validate__($predict,$from) == false) {
 	return false;
    }
 #return the result
 return self::__return__json__($labels,$predict,$from);
 }


public static function __dis_err__($err){
 	$errorMessage = '<p style="color:red;">'.$err.'</p>';
 	return $errorMessage;
 }

public static  function __Bad__Char__($given,$from){   
  if (gettype($given) == 'string') {
     	if (preg_match('/[\^£$%*@#~"();<{}:|=+¬]/',$given) or preg_match("/'/",$given)) {
     		 return true; 
     	}
       if ($from == 'statistics') {
     	if (preg_match('/[\^£$%*@#~"();<{},?:|=+¬]/',$given) or preg_match("/'/",$given)) {
     		 return true; 
     	}
       }
  }
     return false;  
 }


//To validate left part of the command
private static function __validate__($command,$from,$count){
  if ($count < 2  ){
       return array(false,'command not found');
   }
  if ($from == 'linear' or $from == 'polynomial'){
   #input
   if (!($input = explode(',',$command[0]))){
     return array(false,"expecting ',' ");
   }
   if (empty($input[0]) or empty($input[1])){
     return array(false,"empty values given");
   }
  }

  elseif($from == 'statistics'){
      $types = array('mean','median','mode','percentile','std_deviation','variance');
      $given_method = str_replace(' ','',$command[0]);

      if (!in_array($given_method,$types)) {
            return array(false,'given method not available');
      }
  }
  return array(true,true);
 }

//To validate right part of the command
public static function __input__validate__($predict,$from)
 {
 	$errorAction = self::__dis_err__("can't read given prediction value");

  if ($from != 'statistics') {
    if (!isset($predict[0]) or !isset($predict[1]) or (empty($predict[0]) and $predict[0] != 0) or (empty($predict[1]) and $predict[1] != 0))
    {
                   echo $errorAction;
                   return false;
 	}
  }
  elseif($from == 'linear' or $from == 'polynomial')
 {
    if((is_numeric($predict[0]) and is_numeric($predict[1])) or (!is_numeric($predict[0]) and !is_numeric($predict[1])))
    {
                   echo $errorAction;
                   return false;
   }
    elseif(($predict[0] == '>' or $predict[0] == '-' or $predict[1] == '>' or $predict[1] == '-'))
    {
                  echo $errorAction;
                  return false;
   }
 }
 elseif($from == 'statistics'){
   if (empty($predict)) {
                  echo $errorAction;
                  return false;
   }
 }
   return true;
 }


public static function __return__json__($labels,$predict,$from){
 if ($from == 'linear' or $from == 'polynomial') {
  $labels[0]     = str_replace(" ","",$labels[0]);
  $labels[1]     = str_replace(" ","",$labels[1]);
  $predict[0]    = str_replace(" ","",$predict[0]);
  $predict[1]    = str_replace(" ","",$predict[1]);

 $prepare_json = '{\"label-x-0\":\"'.$labels[0].'\",\"label-y-0\":\"'.$labels[1].'\",\"value-x\":\"'.$predict[0].'\",\"value-y\":\"'.$predict[1].'\"}';
 }

 elseif($from == 'statistics'){
  $labels     = str_replace(" ","",$labels);
  $predict    = str_replace(" ","",$predict);
 $prepare_json = '{\"method\":\"'.$labels.'\",\"label\":\"'.$predict.'\"}';
 }
 return $prepare_json;
}
}