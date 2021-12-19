<?php 
namespace App\Class;
use Universe\Class\Universe;
/**
 * 
 */
class SupportingFunctions
{
  public static function RANKWARNING_ERROR_OR_NOT($given)
  {
  	if (!Universe::is_json($given)){
  	 if (str_contains($given,"RankWarning")) {
      echo "<h4 style='color:red;'>".$given."</h4>";
   }
   else{
   echo $given;
   }
   die();
  }
  return true;
  }


}