<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>uploads</title>
<?php 
use Loader\Class\Load; 
use App\Class\File\FetchFile;
use App\Class\File\DeleteFile;

$fetched_file = FetchFile::Build();
$file         = $fetched_file["data"];
$n            = $fetched_file["count"];


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
<?php Load::view("Stars/navigation.html",true);?>
<?php if (isset($_GET['upload'])){Load::view("Stars/next.uploader.php",true);}?>
<link rel="icon shortcut" type="image/png" href='<?php Load::assets("images/logo/sdcl-png.png");?>'>
<link rel="stylesheet" type="text/css" href="<?php Load::assets('css/upload.css'); ?>?<?php echo time(); ?>">
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
<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-upload" class="svg-inline--fa fa-file-upload fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm65.18 216.01H224v80c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-80H94.82c-14.28 0-21.41-17.29-11.27-27.36l96.42-95.7c6.65-6.61 17.39-6.61 24.04 0l96.42 95.7c10.15 10.07 3.03 27.36-11.25 27.36zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg>
</button>
<?php 
}
//if no file is there
if ($n == 0 ){
?>
<div id="No-file" class="container-fluid">
    <button>
    <?php if(!isset($_GET['upload'])){?>
               <img src="<?php Load::assets("images/file.png");?>" width="70%">
                <?php }?>
    </button>
</div>
<?php 
}
//if any file there
if ($n != 0 ) {
?>
<div id="container">
	 <ul class="true-file">
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
   			<td>
                <?php 
                if (!isset($_GET['upload']) && !isset($_GET['delete']) ){
                    ?>
                <div class="dropdown">
                <a href="#"><?php echo $file[$j][0]["file name"];  ?></a>
                  <div class="dropdown-content" id="header-content">
                    <?php 
                  $header_data  = $file[$j][0]["header data"][0];
                  $key          = array_keys($header_data);
                  for ($i=0; $i < count($header_data); $i++) { 
                    ?>
                     <a href="#">
                        <?php echo "<span style='font-weight: bold;'>".$header_data[$key[$i]]."</span> ".$key[$i];  ?> 
                     </a>
                     <?php 
                    }
                     ?>
                  </div>
                </div>
                <?php 
              }
              else{
                ?>
                <a href="#"><?php echo $file[$j][0]["file name"];  ?></a>
                <?php 
            }
            ?>
            </td>
   			<td><?php echo FetchFile::CHANGE_FROM_BYTE($file[$j][0]["file size"]);  ?></td>
   			<td><?php echo date('d/m/y',$file[$j][0]["time"] ); ?></td>
   			<td>
               <?php
if (!isset($_GET['upload']) && !isset($_GET['delete']) ){
               ?>
          <div class="dropdown">
                  <h4 class="dropbtn">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-v" class="svg-inline--fa fa-ellipsis-v fa-w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" style="width:6px;color:#000;">
                    <path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z">
                      
                  </path>
              </svg>
                  </h4>
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
