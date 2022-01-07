<?php
namespace Sodium\Tool\Output;
/**
 * 
 */
class Output
{
	public $tool_name;
	public $value;
	
	public function Get($tool_name,$value,$UI = false)
	{
		$this->tool_name = $tool_name;
		$this->value     = $value;
		if ($UI) {
			$output = $this->UI();
		}
		else{
            $output = $this->terminal();
		}
		return $output;
	}

	public function terminal(){
	if (!$this->isJson($this->value)) {
    		$data = "\033[31m {$this->value}\033 \e[m \n";
    		return $data;
    	}
    	else{
        if($this->tool_name == "linear_regression" or $this->tool_name == "polynomial_regression"){
           $data    = json_decode($this->value,true);
           $keys    = array_keys($data);
           $plot    = $GLOBALS['directory']->plots.$data['plot path'];
           $output  = "
\033[32m {$keys[0]}\e[m : {$data[$keys[0]]}\033\n
\033[32m {$keys[1]}\e[m : {$data[$keys[1]]}\033\n
\033[32m {$keys[2]}\e[m : {$data[$keys[2]]}\033\n
\033[32m plot path\e[m : {$plot}\033\n";
        }
        elseif($this->tool_name == "statistics"){
           $data    = json_decode($this->value,true);
           $keys    = array_keys($data);
           $output  = "";
           for ($i=0; $i < count($data) ; $i++) { 
            $output .= "\033[32m {$keys[$i]}\e[m : {$data[$keys[$i]]}\033\n";       	
            }        
        }
        elseif($this->tool_name == "data_visualization"){
        $data    = json_decode($this->value,true);
        $plot    = $GLOBALS['directory']->plots.$data['plot path'];
        $output  = "\033[32m plot path\e[m : {$plot}\033\n";
        }
        return $output;
    	}

	}

	public function UI(){
    	if (!$this->isJson($this->value)) {
    		$data = "<p style='color:red;'>{$this->value}</p>";
    		return $data;
    	}
    	else{
        if($this->tool_name == "linear_regression" or $this->tool_name == "polynomial_regression"){
           $data    = json_decode($this->value,true);
           $keys    = array_keys($data);
           $plot    = base64_encode(file_get_contents($GLOBALS['directory']->plots.'/'.$data['plot path']));
           $output  = "<p>{$keys[0]} : {$data[$keys[0]]}</p>
                       <p>{$keys[1]} : {$data[$keys[1]]}</p>
                       <p>{$keys[2]} : {$data[$keys[2]]}</p>
                       <img src='data:image/png;base64,{$plot}' width='80%'>
                       <a href='#'>{$data['plot path']}</a>";
        }
        elseif($this->tool_name == "statistics"){
           $data    = json_decode($this->value,true);
           $keys    = array_keys($data);
           $output  = "";
           for ($i=0; $i < count($data) ; $i++) { 
            $output .= "<p>{$keys[$i]} : {$data[$keys[$i]]}</p>";       	
            }        
        }
        elseif($this->tool_name == "data_visualization"){
        $data    = json_decode($this->value,true);
        $plot    = base64_encode(file_get_contents($GLOBALS['directory']->plots.'/'.$data['plot path']));
        $output  = "<img src='data:image/png;base64,{$plot}' width='80%'>
                       <a href='#'>{$data['plot path']}</a>";
        }
        return $output;
    	}

	}

	public function isJson($string) {
       json_decode($string);
       return json_last_error() === JSON_ERROR_NONE;
    }
}