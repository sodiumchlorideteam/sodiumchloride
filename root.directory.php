<?php
/**
 * @return path
 */
class RootDirectory
{
public $root;
public $assets;
public $base_url;
public $controller; 
public $error;
public $galaxies;
public $model;
public $modules;
public $plots;
public $python_files;
public $python_library;
public $stars;
public $uploads;
public $uploaded;//for  deleting purpose
public $view;


public static function LOAD(){
   $directory = new self();
   $directory ->assets = __DIR__.'/assets/';
   $directory ->controller = __DIR__.'/controller';
   $directory->error    = __DIR__.'/error/template';
   $directory ->model  = __DIR__.'/model';
   $directory ->modules = __DIR__.'/modules';
   $directory ->plots   = __DIR__.'\plots';
   $directory ->python_files = __DIR__."/python/files/";
   $directory ->python_library = __DIR__."/python/libraries/";
   $directory ->view  = $view = __DIR__.'/view';
   $directory ->galaxies = $view."/Galaxies/";
   $directory ->stars = $view."/Stars/";
   $directory->uploaded = __DIR__.'/uploads';
   return $directory; 
}
}

$DIRECTORY = $directory = RootDirectory::LOAD();