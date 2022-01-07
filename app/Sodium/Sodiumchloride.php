<?php 
namespace Sodium;
use Exception;
use Error\Class\Error;
use Sodium\Tool\Verification\Verification;
use Sodium\Tool\Restructure\Restructure;
use Sodium\Tool\Execution\Execute;
use Sodium\Tool\Output\Output;
/**
 * 
 */
class Sodiumchloride
{
	protected $argv;
	protected $command;
	
	public function Run(array $argv)
	{
		$this->argv     = $argv;
		$this->command  = $command = $argv[1] ?? null;
        if($command === null){
        	echo Error::CMD_DISPLAY("command not found",true);
        	echo Error::CMD_DISPLAY("use php sodium --help");
        	return false;
        }
		else{
			if($command == "--help"){
            echo $this->help();
			}
			elseif($command == "--tool"){ 
            $tool_name    = $argv[2] ?? null;
            $file_name    = $argv[3] ?? null;
            $tool_command = $argv[4] ?? null;
            $execute = $this->tool($tool_name,$file_name,$tool_command);
          
            if($execute['status'] == 'success'){
              $output = (new Output())->Get($tool_name,$execute['value']);
              echo $output;
            }    
            else{
            	echo $execute['message'];
            }
     		}
			else{
        	echo Error::CMD_DISPLAY("command not found",true);
        	echo Error::CMD_DISPLAY("use php sodium --help");
        	return false;	
             } 
		}
	}

	public function help(){
		return(
"\033[37m Usage:\033 \e[m\n
\033[32m php sodium [<command>]\033 \e[m\n
\033[37m Arguments:\033 \e[m\n
command_name            command name to execute\n
\033[37m Tool commands:\033 \e[m\n
\033[32m --tool linear_regression <file_name> [tool_command]\033 \e[m\n
\033[32m --tool polynomial_regression <file_name> [tool_command]\033 \e[m\n
\033[32m --tool statistics <file_name> [tool_command]\033 \e[m\n
\033[32m --tool datavisualization <file_name> [tool_command]\033 \e[m\n
"
		);
	}

	public function tool($tool_name ,$file_name ,$tool_command,$UI = false){
      $verify = new Verification();
      $START_VERIFICATION = $verify->START_VERIFICATION($tool_name,$file_name,$tool_command);
      if($START_VERIFICATION['status'] == 'failed'){
      	$START_VERIFICATION['message'] = Error::CMD_DISPLAY($START_VERIFICATION['message'],true,$UI);
      	return $START_VERIFICATION;
      }
      $restructred_cmd = Restructure::Build($tool_name,$tool_command);
      if($restructred_cmd['status'] != 'success'){
      	$restructred_cmd['message'] = Error::CMD_DISPLAY("unexpected error found",true,$UI);
        return $restructred_cmd;
      }
      $execute = new Execute();
      return $execute->Run($tool_name,$file_name,$restructred_cmd['value']);
	}
}