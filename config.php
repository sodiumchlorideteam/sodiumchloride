<?php
use Universe\Class\Universe;
/**
 * DIRECTORY RESOURCES
 */
$PATH                =  pathinfo(getcwd());
$CURRENT_DIRECTORY   = $PATH['basename'];
/**
* SERVER RESOURCES
*/
 $PROTOCAL       = $protocal       = (empty($_SERVER['HTTPS'])) ? "http://":"https://" ;
 $HOST           = $host           = $_SERVER["HTTP_HOST"];
 $REQUESTED_PATH = $requested_path = parse_url(Universe::CLEAN_URL($_SERVER['REQUEST_URI']),PHP_URL_PATH);
 $METHOD         = $method         = $_SERVER['REQUEST_METHOD'];
 $WORKING_PATH   = $GLOBALS['directory']->root = $protocal.$host.str_replace("index.php","",$_SERVER['PHP_SELF']);
 $GLOBALS['directory']->uploads    = $WORKING_PATH."/uploads";
 /**
 * PYTHON DATA
 */
   $py_location = $GLOBALS['directory']->python_files."__init__.py";
   $py_modules  = $GLOBALS['directory']->python_files;
   $py_library  = $GLOBALS['directory']->python_library;
   $python_data = array($py_location,$py_modules,$py_library);