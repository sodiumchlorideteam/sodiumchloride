<?php 
namespace Sodium\Tool\Execution;
/**
 * 
 */
class Execute
{
	
	public function Run($tool_name,$file_name,$prepared_json)
	{
		$directory   = $GLOBALS['directory'];
		$file_path   = $directory->uploaded.$file_name;
		$Python_data = $GLOBALS['python_data'];
      $Execute     = $this->execute($tool_name,$file_name,$file_path,$Python_data,$prepared_json);
		return array("status"=>"success","value"=>$Execute);
	}

	public function execute($tool_name,$file_name,$file_path,$python_data,$prepared_json){
       $plot_path   = $GLOBALS['directory']->plots;
       $python      = getenv("PYTHON_CALL");
       $py_location = $python_data[0];
       $py_modules  = $python_data[1];
       $py_library  = $python_data[2];
//call python
   if ($tool_name == "linear_regression" or $tool_name == "polynomial_regression" or $tool_name == "data_visualization")
   {
      $execute = shell_exec($python.' '.$py_location.' 2>&1 '.$py_modules.' '.$py_library.' '.$file_name.' '.$file_path.' '.$tool_name.' '.$plot_path.' '.$prepared_json.' ');
   } 
   else
   {
   $execute = shell_exec($python.' '.$py_location.' 2>&1 '.$py_modules.' '.$py_library.' '.$file_name.' '.$file_path.' '.$tool_name.' '.$prepared_json.' ');
   }
   return $execute;
	}
}