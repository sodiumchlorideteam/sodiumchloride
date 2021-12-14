<!DOCTYPE html>
<html>
<?php 
use Loader\Class\Load; 
use View\Class\LabTemplate;
use View\Class\FetchFileToHTML;
use View\Class\ExampleCommands;

$page           = array("data visualization","statistics","linear regression","polynomial regression");
$page_number    = $GLOBALS['page_number'];
$select_element = FetchFileToHTML::Build();
$commands       = exampleCommands::create($page_number);
?>
<head>
  <title><?php echo $page[$page_number]; ?></title>
  <link rel="icon shortcut" type="image/png" href='<?php echo $GLOBALS["WORKING_PATH"]."/assets/images/logo/sdcl-png.png";?>'>
      <script src="https://kit.fontawesome.com/01902bbe93.js" crossorigin="anonymous"></script>
	<style type="text/css">
        <?php Load::css("dv.css");  
              Load::css("navigation.css"); 
              Load::css("bootstrap-reboot.min.css"); 
              Load::css("bootstrap.css"); 
              Load::css("bootstrap.min.css"); ?>
 </style>
 <script type="text/javascript">
                <?php Load::js("jquery-3.6.0.min.js"); 
                  Load::js("bootstrap.js"); 
                  Load::js("bootstrap.bundle.js"); 
                  Load::js("bootstrap.bundle.min.js"); ?>
 </script>
 <script type="text/javascript">
   function close_window() {
  if (confirm("Do you want to close this window ?")) {
    close();
  }
}
 </script>
</head>
<body>
  <ul  class="top_bar">
    <p onclick="window.location.href='<?php echo $directory ->root;  ?>';" style="cursor:pointer;">
      &larr;
    </p>
    <h3 style="  font-family: 'Josefin Sans', sans-serif;text-transform:uppercase;">
      <img src="data:image/png;base64,<?php Load::images('logo/sdcl-png.png');?>" width="100px">
      Sodium chloride space
    </h3>
    <h3 style="margin-left:auto;margin-right:2%;cursor:pointer;" onclick="close_window()">&times;</h3>
  </ul>
  <div id="box-container">
<div id="root-root-linear" class="container-fluid">
  <ul id="linear-input">
    <li>
      <button class="btn btn-primary"><?php echo $page[$page_number]; ?></button>
    </li>
    <hr/>
    <li>
      <form enctype="multipart/form-data" id="calc-linear">
    <?php echo $select_element;   ?>
         <br/>
         <details>
          <summary style="color:blue;" onclick="changeArrow()">command 
            <i class="fas fa-caret-right" style="color:blue;" id="arrow"></i>
          </summary>
          <p id="example-commands" style="padding:1%;background-color:#fff;">
            <?php echo $commands; ?>
          </p>        
         </details>
         <input type="text" name="command" class="form-control" autocomplete="off">
         <br/>
         <input type="hidden" name="from" value="<?php echo $page[$page_number]; ?>">
         <input type="submit" value="calculate" class="btn btn-primary">
      </form>
    </li>
  </ul>
<ul id="linear-output">
  <li>
    <button class="btn btn-primary">output</button></li>
    <hr/>
    <div id="uploadStatus">
    </div>
    <div class="progress" style="display:none;height:10px;border-radius:0px;">
      <div class="progress-bar" id="progress-bar"></div>
    </div>
      <li id="output"></li>
</ul>
</div>
  </div>
</body>
 <script type="text/javascript">
          <?php Load::js("calculate.js");  ?>
      /*arrow function*/
function changeArrow(){
      var arrow = document.getElementById('arrow');

      if(arrow.classList.contains("fa-caret-right")){
        arrow.classList.remove("fa-caret-right");
        arrow.classList.add("fa-sort-down");
      }
      else{
        arrow.classList.remove("fa-sort-down");
        arrow.classList.add("fa-caret-right");
      }
      };
  </script>
</html>