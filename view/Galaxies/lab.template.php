<?php
use Loader\Class\Load; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Explore lab !</title>
		<link rel="icon shortcut" type="image/png" href='<?php echo $GLOBALS["WORKING_PATH"]."/assets/images/logo/sdcl-png.png";?>'>
	<style type="text/css">
		<?php Load::css("lab.css"); ?>
	</style>
	<script src="https://kit.fontawesome.com/01902bbe93.js" crossorigin="anonymous"></script>
</head>
<body>
			<?php Load::stars("navigation.html");?>
    <div class="main_content">
        <div id="lab-box">
            <ul id = "ds-tools">
               <button class="btn btn-primary">Datascience</button> 
               <li class ="tool-box">
		         <a href="./data-visualization/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="data:image/png;base64,<?php Load::images("Graph.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">data visualization</h6>
	                </div>
	             </a>
	             <a href="./statistics/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="data:image/png;base64,<?php Load::images("work.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">statistics</h6>
	                </div>
	             </a>
               </li>
            </ul>
            <ul id = "ml-tools">
               <button class="btn btn-primary">Machine Learning</button> 
               <li class ="tool-box">
		         <a href="./linear-regression/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="data:image/png;base64,<?php Load::images("linear.png");?>" width="80%">
	                	<br/><br/>
	                	<h6 class="text-center">Linear regression</h6>
	                </div>
	             </a>
	             <a href="./polynomial-regression/" class="root-root-equipments-tools" target="_blank">
	                <div>
	                	<img src="data:image/png;base64,<?php Load::images("poly.png");?>" width="80%">
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








<!--
<div id="root-root-lab" class="container-fluid">
	<div>
	<ul>
		<li class="root-root-lab-head">
			<h3>
				ds equipments
			</h3>
		</li>
	</ul>
	<hr class="root-root-lab-hr">
	<ul class="root-root-equipments">
		<a href="./data-visualization/" class="root-root-equipments-tools">
		<li >
			<img src="https://datatopoint.tech/assets/images/Graph.png">
			<br/><br/>
			<h4>data visualization</h4>
		</li>
	</a>
		<a href="./statistics/" class="root-root-equipments-tools">
		<li>
			<img src="https://datatopoint.tech/assets/images/work.png">
			<br/><br/>
			<h4>d's statistics </h4>
		</li>
	</a>
	</ul>
</div>
<div>
	<br/>
	<ul>
		<li class="root-root-lab-head">
			<h3>
				ML equipments
			</h3>
		</li>
	</ul>
	<hr class="root-root-lab-hr">
	<ul class="root-root-equipments">
	<a href="./linear-regression/" class="root-root-equipments-tools">
		<li >
			<img src="https://datatopoint.tech/assets/images/linear.png">
			<br/><br/>
			<h4>linear regression</h4>
		</li>
	</a>
		<a href="./polynomial-regression/" class="root-root-equipments-tools">
		<li>
			<img src="https://datatopoint.tech/assets/images/poly.png">
			<br/><br/>
			<h4>polynomial regression </h4>
		</li>
	</a>
	</ul>
</div>
</div>-->