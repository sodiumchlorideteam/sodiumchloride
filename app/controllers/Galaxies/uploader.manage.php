<?php 
use App\Class\Upload\UploadFunctions;
$file = $_FILES['file'];
//handling
          $upload_class = new UploadFunctions();
          if ($upload_class->UploadThisFile($file,$directory)) {
              echo 'ok';
          }
?>