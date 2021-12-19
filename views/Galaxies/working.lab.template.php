<!DOCTYPE html>
<html>
<?php 
use Loader\Class\Load; 
use View\Class\FetchFileToHTML;
use View\Class\ExampleCommands;

$page           = array("data visualization","statistics","linear regression","polynomial regression");
$page_number    = $GLOBALS['page_number'];
$select_element = FetchFileToHTML::Build();
$commands       = exampleCommands::create($page_number);
?>
<head>
  <title><?php echo $page[$page_number]; ?></title>
  <link rel="icon shortcut" type="image/png" href='<?php Load::assets("images/logo/sdcl-png.png");?>'>
  <script src="https://kit.fontawesome.com/01902bbe93.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="<?php Load::assets('css/dv.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php Load::assets('css/navigation.css'); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
      <img src="<?php Load::assets('images/logo/sdcl-png.png');?>" width="100px">
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
    <script type="text/javascript" src="<?php Load::assets('js/jquery-3.6.0.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php Load::assets('js/calculate.js'); ?>"></script>
 <script type="text/javascript">
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
</body>
</html>