<?php 
use Loader\Class\Load; 
use App\Class\File\FetchFile;
use Model\Class\Universal;
use App\Class\File\DeleteFile;

$fetched_file = FetchFile::__init__();
$file         = $fetched_file[0];
$n            = $fetched_file[1];


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
    <link rel="icon shortcut" type="image/png" href='<?php Load::assets("images/logo/sdcl-png.png");?>'>
    <link rel="stylesheet" type="text/css" href="<?php Load::assets('css/upload.css'); ?>">
    <?php Load::view("Stars/navigation.html",true);?>
<?php 
if (isset($_GET['upload'])){
Load::view("Stars/next.uploader.php",true); 
} 
?>
  <link rel="stylesheet" type="text/css" href="<?php Load::assets('css/navigation.css'); ?>">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script type="text/javascript" src="<?php Load::assets('js/jquery-3.6.0.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                <span onclick="window.location.href='?upload';"><?php  Load::view("Stars/emoji.php",true); ?></span>
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
