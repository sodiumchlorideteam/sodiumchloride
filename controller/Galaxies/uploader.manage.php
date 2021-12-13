<?php 
use Model\Inbuilt\Store;
use App\Class\Upload\UploadFunctions;
//resources
            $initiate           = store::__init__();
            $initiate ->upload_this_file    = $file = $_FILES['file'];
//handling
          $upload_class = new UploadFunctions();
          if ($upload_class->UploadThisFile($file,$directory)) {
              echo 'ok';
          }
?>