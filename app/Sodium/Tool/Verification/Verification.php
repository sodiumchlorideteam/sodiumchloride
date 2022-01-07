<?php 
namespace Sodium\Tool\Verification;
use Sodium\Tool\Verification\ToolCommand;
use Error\Class\Error;
/**
 * 
 */
class Verification
{
	private $tool_name;
	private $file_name;
	private $tool_command;

	public  function START_VERIFICATION($tool_name ,$file_name,$tool_command)
	{
	    if($tool_name == null or $file_name == null or $tool_command == null) {
                return array("status"=>"failed","message"=>"command not found");
         }
     $this->tool_name    = $tool_name;
     $this->file_name    = $file_name;
     $this->tool_command = $tool_command;

    //TOOL NAME VERIFICATION
         if (!$this->TOOL_NAME_VERIFICATION()) {
         	return array("status"=>"failed","message"=>"tool name not found");
         }
    //FILE CHECK
         $file_check = $this->FILE_CHECK();
         if ($file_check['status'] == "failed") {
         	return $file_check;
         }
    //TOOL COMMAND VERIFICATION
         $tool_cmd_verification = $this->TOOL_COMMAND_VERIFICATION();
         return $tool_cmd_verification;
	}

	public function TOOL_NAME_VERIFICATION(){
     $tools = array("linear_regression","polynomial_regression","statistics","data_visualization");
     $tool  = $this->tool_name;
     if (!in_array($tool,$tools)) {
     	return false;
     }
     return true;
	}

	public function FILE_CHECK()
	{
		$upload = $GLOBALS['directory']->uploaded;

		if (!file_exists($upload.$this->file_name)) {
         	return array("status"=>"failed","message"=>"file not found");
		}
		$split_file = explode(".",$this->file_name);
		$extension  = end($split_file);
		$allowed_type = array("csv","xlsx","xls");
		if (!in_array($extension,$allowed_type)) {
			return array("status"=>"failed","message"=>"File extension not supported");
		}
		return array("status"=>"success");
	}

	public function TOOL_COMMAND_VERIFICATION(){
    $tool_class = new ToolCommand();
    $result     = $tool_class->START($this->tool_name,$this->tool_command);
    return $result;
	}
}
