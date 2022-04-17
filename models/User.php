<?php
namespace app\models;

use app\engine\Db;

class User
{
    public $id;
    public $login;
    public $pass;

    protected $db;

    public function __construct(Db $db)
    {   
        $this->db = $db;
    }

    public function getUserCart($user_id) {
        $result = $this->db->queryCustomerCart($user_id)->fetchAll();
        for ($i = 0; $i < count($result); $i++) { 
            print_r($result[$i]);
            echo "<br>";
        }
    }

    public function getUserCartItem($user_id, ...$products) {
        return $this->db->queryCustomerCartItem($user_id, ...$products);
    }
}