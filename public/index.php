<?php
include "../engine/Autoload.php";

use app\engine\{Autoload, Db};
use app\models\{Product, User, Cart};

spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $db = new Db('mysql:host=localhost;dbname=shop', 'root', '');
} catch (PDOException $error) {
    print "Error!: " . $error->getMessage();
    die();
}

$product = new Product($db);
$user = new User($db);
$cart = new Cart($db);

//$product->getAllProducts();
//$cart->addToCart(1, 4, 2);
//$cart->addToCart(1, 5, 1);

$user->getUserCart(1);