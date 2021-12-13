<?php 
namespace App\Class\Lab;
use  App\Class\Command\UnderstandCommand;
use App\Class\Command\Dv\Dv;
/**
 * 
 */
class Calculate
{
public static function calculate($from){
   $file        = $_SESSION[$_POST['file_name']];
   $file_name   = $file['file name'];
   $command     = $_POST['command'];
   $python_data = $GLOBALS['python_data'];
//check file extension
   self::CHECK_FILE_TYPE($file_name);
//get sources from given command
   if ($from != "data-visualization") {
   if(!($returned_json = UnderstandCommand::__build__($command,$from))){return false;}
   }
   else{
   if(!($returned_json = Dv::make($command))){return false;}
   }
   $file_path = $file['file path'];
   $execute = self::__call__python__($python_data,$file_name,$file_path,$returned_json,$from);
   return $execute;
	}

public static function __call__python__($python_data,$file_name,$file_path,$todo_json,$from)
{
   $plot_path   = $GLOBALS['directory']->plots;
   $py_location = $python_data[0];
   $py_modules  = $python_data[1];
   $py_library  = $python_data[2];

//call python
   if ($from == "linear" or $from == "polynomial" or $from == "data-visualization")
   {
      $execute = shell_exec('python '.$py_location.' 2>&1 '.$py_modules.' '.$py_library.' '.$file_name.' '.$file_path.' '.$from.' '.$plot_path.' '.$todo_json.' ');
   } 
   else
   {
   $execute = shell_exec('python '.$py_location.' 2>&1 '.$py_modules.' '.$py_library.' '.$file_name.' '.$file_path.' '.$from.' '.$todo_json.' ');
   }
   return $execute;
}

public static function CHECK_FILE_TYPE(string $file){
   $split_file   = explode(".",$file);
   $extension    = end($split_file);
   $allowed_type = array("csv","xlsx","xls");
   if (!in_array($extension,$allowed_type)) {
      echo "<p style='color:red;'>File extension not supported</p>";
      die();
   }
   return true;
}
}