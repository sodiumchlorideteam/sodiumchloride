<?php
use Loader\Class\Load; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>sodium chloride </title>
	<link rel="icon shortcut" type="image/png" href='<?php Load::assets("images/logo/sdcl-png.png");?>'>
   <link rel="stylesheet" type="text/css" href="<?php Load::assets("css/dashboard.css"); ?>">
	<script src="https://kit.fontawesome.com/01902bbe93.js" crossorigin="anonymous"></script>
</head>
<body>
			<?php Load::view("Stars/navigation.html",true);?>
    <div class="main_content">
        <div id="lab-box">
            <ul id = "ds-tools">
               <button class="btn btn-primary">Tools</button> 
               <li class ="tool-box">
		         <a href="./data-visualization/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="<?php Load::assets("images/Graph.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">data visualization</h6>
	                </div>
	             </a>
	             <a href="./statistics/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="<?php Load::assets("images/work.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">statistics</h6>
	                </div>
	             </a>
               </li>
            </ul>
            <ul id = "ml-tools">
               <li class ="tool-box">
		         <a href="./linear-regression/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="<?php Load::assets("images/linear.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">Linear regression</h6>
	                </div>
	             </a>
	             <a href="./polynomial-regression/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="<?php Load::assets("images/poly.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">Polynomial regression</h6>
	                </div>
	             </a>
               </li>
            </ul>
        </div>
    </div>
  </div>
</body>
</html>