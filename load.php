<?php
// class auto loader

function classAutoLoad($classname){
    $directories = ["Content", "layout", "menus"];

    foreach($directories as $dir){
        $filename =  dirname(__FILE__). DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $classname . ".php";
        if(file_exists($filename) && is_readable($filename)){
            require_once $filename;
        }
    } 
}  

spl_autoload_register('classAutoLoad');

//Create instance of all classes

$Objlayout = new layout();
$ObjMenus = new menus();
$Objheadings = new headings();
$ObjContents= new contents();

?>
