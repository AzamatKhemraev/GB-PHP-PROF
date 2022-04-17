<?php
namespace app\models;

use app\engine\Db;

class Cart
{
    public $id;
    public $user_id;
    public $product_id;
    public $product_amount;
    public $db;
    
    public function __construct(Db $db){
        $this->db = $db;
    }

    public function addToCart($user_id, $product_id, $product_amount){
        $query = $this->db->queryAddToCart($user_id, $product_id, $product_amount);
        $result = $this->db->query($query);
    }
}