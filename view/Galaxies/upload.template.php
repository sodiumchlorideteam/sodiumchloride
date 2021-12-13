<?php 
use Loader\Class\Load; 
use App\Class\File\FetchFile;
use Model\Class\Universal;
use App\Class\File\DeleteFile;

$fetched_file = FetchFile::__init__();
$file         = $fetched_file[0];
$n            = $fetched_file[1];

//download the file
if (!isset($_GET['delete']) and  isset($_GET['url']) and isset($_GET['id'])){
if (DownloadFile::download($_GET['url'],$_GET['id'])) {
    header("location:".$directory->uploads);
}
else{
    echo "<h2 style='color:red;'>some error  occurred</h2>";
    die();
}
}
//delete the file
if (isset($_GET['delete']) and  isset($_GET['url']) and isset($_GET['id'])){
    $delete    = new DeleteFile();
if ($delete->delete($_GET['url'],$_GET['id'])) {
    header("location:".$directory->uploads);
}
else{
    echo "<h2 style='color:red;'>some error  occurred</h2>";
    die();
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>uploads</title>
    <link rel="icon shortcut" type="image/png" href='<?php echo $GLOBALS["protocal"].$GLOBALS["host"]."/datatopoint/assets/images/logo/sodiumchloride.png";?>'>
<style type="text/css">
    <?php Load::css("upload.css"); ?>
</style>
<?php Load::stars("navigation.html");?>
<?php 
if (isset($_GET['upload'])){
Load::stars("next.uploader.php"); 
} 
?>
       <style type="text/css">
            <?php Load::css("navigation.css"); 
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
</head>
<body id="body">
<?php 
if (!isset($_GET['upload']) && !isset($_GET['delete']) ){
?>
<button id="upload-button" class="btn btn-primary" onclick="window.location.href='?upload';">
   <i class="fas fa-file-upload"></i>
</button>
<?php 
}
//if no file is there
if ($n == 0 ){
?>

<div id="root-root-upload" class="container-fluid">
    <button  style="background-color:#fff;border:solid 1px #fff;color:#000;display:block;outline:none;">
                <h3 style="color:#423838;">no files to show !</h3>
                <br/>
                <?php if(!isset($_GET['upload'])){?>
                <span onclick="window.location.href='?upload';"><?php  Load::stars("emoji.php"); ?></span>
                <?php }?>
    </button>
</div>
<?php 
}
//if any file there
if ($n != 0 ) {
?>
<div id="upload-true-body">
	 <ul class="upload-true-body">
   	<table>
   		<tr class="table-first">
   			<td>file name</td>
   			<td>file size</td>
   			<td>uploaded date</td>
   			<td>actions</td>
   		</tr>
<?php
for ($j=0; $j < $n; $j++) { 
?>
   		<tr>
   			<td><?php echo $file[$j][0]["file name"];  ?></td>
   			<td><?php echo Universal::__change__byte($file[$j][0]["file size"]);  ?></td>
   			<td><?php echo date('d/m/y',$file[$j][0]["time"] ); ?></td>
   			<td>
               <?php
if (!isset($_GET['upload']) && !isset($_GET['delete']) ){
               ?>
          <div class="dropdown">
                  <h4 class="dropbtn"><i class="fa fa-ellipsis-v"  id="i"></i></h4>
                  <div class="dropdown-content">
                     <a href="?delete&url=<?php  echo $file[$j][0]['unique id'];  ?>&id=<?php  echo $j;  ?>">
                        delete
                     </a>
                  </div>
                </div>
<?php 
}
 ?>
   			</td>
   		</tr>
         <?php 
}
}
          ?>
   	</table>
   </ul>
</div>
</body>
</body>
</html>
