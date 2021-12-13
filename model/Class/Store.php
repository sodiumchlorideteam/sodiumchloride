<?php 
namespace Model\Class;
/**
 * 
 */
class store
{
	public $file;
	public $command;
	public $upload_this_file;
    public $uploaded_json_data_as_array;

	public static function __init__(){
		$init        = new self();
		return $init; 
	}
   
}
?>