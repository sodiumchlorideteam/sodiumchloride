<?php
use Universe\Class\Universe;
/**
 * 
 */
 $ROOT           = $root           =  Universe::GET_ROOT(getcwd());
 $BASE           = $base           = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
 $PROTOCAL       = $protocal       = (empty($_SERVER['HTTPS'])) ? "http://":"https://" ;
 $HOST           = $host           = $_SERVER["HTTP_HOST"];
 $REQUESTED_PATH = $requested_path = Universe::CLEAN_URL($_SERVER['REQUEST_URI']);
 $METHOD         = $method         = $_SERVER['REQUEST_METHOD'];
 /**
 * @return python data
 */
 //python data
   $py_location = $GLOBALS['directory']->python_files."__init__.py";
   $py_modules  = $GLOBALS['directory']->python_files;
   $py_library  = $GLOBALS['directory']->python_library;
   $python_data = array($py_location,$py_modules,$py_library);