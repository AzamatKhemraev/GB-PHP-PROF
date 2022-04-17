<?php
namespace app\engine;

class Autoload
{
    public function loadClass($className){
        include "../models/$className.php";
    }
}