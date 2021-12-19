<?php
use Universe\Class\Universe;
use AppData\Directory;
/**
 * DIRECTORY RESOURCES
 */
$PATH                =  pathinfo(getcwd());
$CURRENT_DIRECTORY   = $PATH['basename'];
$DIRECTORY           = $directory = new Directory();
$directory->app_data   = __DIR__.'/app/app_data/';
$directory->controller   = __DIR__.'/app/controllers';
$directory->error    = __DIR__.'/app/error/template';
$directory->model    = __DIR__.'/app/model/';
$directory->plots    = __DIR__.'/plots/';
$directory->python   = __DIR__."/python/";
$directory->views    = __DIR__.'/views';
$directory->assets   = __DIR__.'/assets/';
$directory->uploaded   = __DIR__.'/uploads';
/**
* SERVER RESOURCES
*/
 $PROTOCAL       = $protocal       = ($_ENV['HTTPS_ON']) ? "https://":"http://" ;
 $HOST           = $host           = $_SERVER["HTTP_HOST"];
 $REQUESTED_PATH = $requested_path = parse_url(Universe::CLEAN_URL($_SERVER['REQUEST_URI']),PHP_URL_PATH);
 $METHOD         = $method         = $_SERVER['REQUEST_METHOD'];
 $WORKING_PATH   = $GLOBALS['directory']->root = $protocal.$host.str_replace("index.php","",$_SERVER['PHP_SELF']);
 $directory->assets   = $WORKING_PATH.'public/';
 $directory->uploads    = $WORKING_PATH."uploads";
 /**
 * PYTHON DATA
 */
$python_data = array($directory->python."files/__init__.py",$directory->python."files/",$directory->python."library/");