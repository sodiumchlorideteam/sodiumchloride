<?php 
namespace App\Class\File;
use App\Class\File\FetchFile;
use App\Class\Json\JsonHandling;
/**
 * 
 */
class DeleteFile
{
use JsonHandling;
  public  function delete($url,$id){
 	$directory    = $GLOBALS['directory']; 
    $fetched_file = FetchFile::__init__();
    $file         = $fetched_file[0];
    $n            = $fetched_file[1];
    $path         = $file[$id][0]['file path'];
    $file_name    = $file[$id][0]['file name'];
  if ($n==0) {
       echo "unexpected error found !";
       return false;
       die();
   }
  if ($file[$id][0]["unique id"] == $url) {
      for ($j=0; $j < $n; $j++) { //loop starting
      	//if more files in record
     	if (($j == $id and $n !=1) or ( $j > $id and $j != $n-1)){
   		self::delete_this($path,$file_name);
   		$file[$j] = $file[$j+1];
    	}
    	//if less files in record
    	if ($j == $n-1 or $n == 1) {
   		self::delete_this($path,$file_name);
   		unset($file[$j]);
    	}
   }//loop ending
   $file = $this->__prepare__old__data__($file,count($file));
  
  //change record
  if (empty($file)){file_put_contents('model/uploaded.json','{}');}
  else{file_put_contents('model/uploaded.json',"{".$file."}");}
   
 return true;
   }
 }

 public static function delete_this($path,$name)
 {
 	if (!file_exists($path)) {
 		echo "requested file not found !";
 		return false;
 	}
        if (!unlink($path)) { 
                echo ($name."cannot be deleted due to an error"); 
                return false;
                }
        return true;
 }
}