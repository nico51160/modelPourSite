<?php 

session_start();
spl_autoload_register('autoload');
function autoload($className){
    $arrays_paths=array(
        'database/',
        'models/',
        'controllers/',
    );
    $parts=explode('\\',$className);
    $name=array_pop($parts);//get last item which is class name
    foreach($arrays_paths as $path){
        $file=sprintf($path.'%s.php',$name);
        if(is_file($file)){
            include($file); // like include('controllers/UserController.php');
        }
    }
}