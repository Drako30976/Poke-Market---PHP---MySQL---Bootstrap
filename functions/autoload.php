<?php
session_start();

function autoloadClass($className){

    $classFile = __DIR__ . "/../clases/$className.php";

    if (file_exists($classFile)) {
        require_once $classFile;
    }else {
        die("No se encontro la clase indicada: $classFile");
    }

}

spl_autoload_register('autoloadClass');