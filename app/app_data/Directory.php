<?php 
namespace AppData;
/**
 * 
 */
class Directory
{
public $root;
public $assets;
public $base_url;
public $controller; 
public $error;
public $model;
public $plots;
public $python_files;
public $python_library;
public $uploads;
public $uploaded;//for  deleting purpose
public $view;


public  function set($name,$value){
   $directory = new self();
   $directory ->$name = $value;
   return $directory; 
}
}