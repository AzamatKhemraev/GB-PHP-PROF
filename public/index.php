<?php

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

// function __autoload($className) {
//     (new Autoload())->loadClass($className);
// };

$user = new User();
$product = new Product();

var_dump($product);
var_dump($user);