<?php
namespace App\Class\Lab\Output;
/**
 * 
 */
class Display
{
  public static function display($who,$json,$plot,$plot_name = NULL){
   if($who == "linear"){
      $html = "<p>relationship betwen X and Y :{$json['r']}</p>
           <p>{$json['message']}</p>
           <p>Prediction : {$json['prediction']}</p>
           <img src='data:image/png;base64,{$plot}' width='80%'>
           <a href='#'>{$plot_name}</a>
           ";
    echo $html;
   }
   elseif ($who == "polynomial") {
      $html = "<p>r2 score : {$json['r']}</p>
               <p>Prediction : {$json['prediction']}</p>
               <img src='data:image/png;base64,{$plot}' width='80%'>
               <a href='#'>{$plot_name}</a>";
    echo $html;
   }
   elseif ($who == "statistics") {
      echo $json;
   }
   elseif($who == "data-visualization"){
      $html = "<img src='data:image/png;base64,{$plot}' width='80%'>
               <a href='#'>{$plot_name}</a>";
      echo $html;
   }
   return true;
  }
}