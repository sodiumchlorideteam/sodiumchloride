<?php 
use Route\Class\Router;
use Loader\Class\Load;


if ($method == "GET") {
Router::GET("/",0,function(){
 Load::view("Galaxies/lab");
});

Router::GET("/data-visualization",0,function(){
   $GLOBALS['page_number'] = 0;
   Load::view("Galaxies/working.lab");
});

Router::GET("/statistics",0,function(){
   $GLOBALS['page_number'] = 1;
   Load::view("Galaxies/working.lab");
});

Router::GET("/linear-regression",0,function(){
   $GLOBALS['page_number'] = 2;
   Load::view("Galaxies/working.lab");
});

Router::GET("/polynomial-regression",0,function(){
   $GLOBALS['page_number'] = 3;
   Load::view("Galaxies/working.lab");
});

Router::GET("/uploads",0,function(){
 Load::view("Galaxies/upload");
});

Router::GET("/uploads/?upload",0,function(){
 Load::view("Galaxies/upload");
});

Router::GET("/uploads/?delete",1,function(){
 Load::view("Galaxies/upload");
},array("url","id"));
}

elseif ($method == "POST") {
@$post_calculate_parameters = array($_POST['file_name'],$_POST['command'],$_POST['from']);

Router::POST("/data-visualization/calculate",0,function(){
  Load::controller("Galaxies/dv"); 
},$post_calculate_parameters);

Router::POST("/statistics/calculate",0,function(){
   Load::controller("Galaxies/statistics.calculate"); 
},$post_calculate_parameters);

Router::POST("/linear-regression/calculate",0,function(){
   Load::controller("Galaxies/linear.calculate"); 
},$post_calculate_parameters);

Router::POST("/polynomial-regression/calculate",0,function(){
 Load::controller("Galaxies/polynomial.calculate"); 
},$post_calculate_parameters);

Router::POST("/uploads/uploadIt",1,function(){
   Load::controller("Galaxies/uploader"); 
});
}
?>