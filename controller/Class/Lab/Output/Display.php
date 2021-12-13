<?php
namespace App\Class\Lab\Output;
/**
 * 
 */
class Display
{
  public static function display($who,$json,$plot,$plot_name = NULL){
   if($who == "linear"){
      $html = "<h4>relationship betwen X and Y :{$json['r']}</h4>
           <h4>{$json['message']}</h4>
           <h4>Prediction : {$json['prediction']}</h4>
           <img src='data:image/png;base64,{$plot}' width='80%'>
           <a href='#'>{$plot_name}</a>
           ";
    echo $html;
   }
   elseif ($who == "polynomial") {
      $html = "<h4>r2 score : {$json['r']}</h4>
               <h4>Prediction : {$json['prediction']}</h4>
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