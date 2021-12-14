<?php 
namespace App\Class\Json;
trait JsonHandling{
function __prepare__old__data__($json,$n)
{
   $old = '';
   for ($i= 0; $i < $n ; $i++) { 
  if ($i == 0) {
     $old = ' "'.$i.'" : [
        {
         "file name":"'.$json[$i][0]["file name"].'",
         "file format":"'.$json[$i][0]["file format"].'",
         "file size" : "'.$json[$i][0]["file size"].'",
         "file path":"'.$json[$i][0]["file path"].'",
         "time":"'.$json[$i][0]["time"].'",
         "unique id":"'.$json[$i][0]["unique id"].'",
         "status" :"'.$json[$i][0]["status"].'"
        }
    ]';
  }
  else{
     $old .= ",".' "'.$i.'" : [
        {
         "file name":"'.$json[$i][0]["file name"].'",
         "file format":"'.$json[$i][0]["file format"].'",
         "file size" : "'.$json[$i][0]["file size"].'",
         "file path":"'.$json[$i][0]["file path"].'",
         "time":"'.$json[$i][0]["time"].'",
         "unique id":"'.$json[$i][0]["unique id"].'",
         "status" :"'.$json[$i][0]["status"].'"
        }
    ]';
  }
}
return $old;
}
function __preapare__new__data__($n,$file,$path,$url){
 $new =' "'.($n).'" : [
        {
         "file name":"'.$file["name"].'",
         "file format":"'.$file["type"].'",
         "file size" : "'.$file["size"].'",
         "file path":"'.$path.'",
         "time":"'.time().'",
         "unique id":"'.$url.'",
         "status" :"active"
        }
    ]';
    return $new;
}
function __prepare__all__($old,$new){
   if(!empty($old)){
      $prepared  = '{
         '.$old.',
         '.$new.'
         }';
   }
   else{
      $prepared  = '{
         '.$new.'
         }';   
   }
return $prepared; 
}
}
?>
