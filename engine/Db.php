<?php
namespace app\engine;

use PDO;

class Db extends PDO
{

    public function queryProducts(){
        return "SELECT * FROM products";

    }

    public function queryCart() {
        return PDO::query("SELECT cart.*, products.name FROM cart LEFT JOIN products ON cart.product_id = products.id");
    }

    public function queryCustomerCart($user_id) {
        return PDO::query("SELECT cart.*, products.name FROM cart LEFT JOIN products ON cart.product_id = products.id
            WHERE user_id = $user_id");
    }

    public function queryCustomerCartItem($user_id, ...$products) {
        $products_str = "";
        foreach ($products as $product) {
            if($product == end($products)) {
                $products_str = $products_str . "'$product'";
            }
            else {
                $products_str = $products_str . "'$product', ";
            }
          }
          return PDO::query("SELECT * FROM cart WHERE user_id = $user_id
            AND product_name IN ($products_str)");

    }

    public function queryAddToCart($user_id, $product_id, $product_amount){
        return PDO::query("INSERT INTO cart(user_id, product_id, product_amount) VALUES ($user_id, $product_id, $product_amount)");
    }
}