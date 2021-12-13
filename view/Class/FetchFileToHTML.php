<?php 
namespace View\Class;
use App\Class\File\FetchFile;
/**
 * 
 */
class FetchFileToHTML
{
	
	public static function Build()
	{
         $file = FetchFile::__init__();
         $file_data = $file[0];
         $file_columns = $file[1];
         $html   = self::returnHTML(self::option_html($file_columns,$file_data));
         return $html;
	}
	private static  function option_html($n,$file_data)
	{
		     $option_html = "";    
     for ($k=0; $k < $n; $k++) { 
        $file_name = $file_data[$k][0]["file name"];
        $_SESSION[$file_name] = $file_data[$k][0];


        $option_html      .= "<option>".$file_name."</option>";
           }
        return $option_html;  
           
	}
	private static function returnHTML($option_html)
	{
		$html = '<select class="form-control" name="file_name" id="file_name">'.$option_html.'</select>';
		return $html;
	}
}
?>