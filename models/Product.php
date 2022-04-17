<?php
namespace app\models;

use app\engine\Db;

class Product
{
    public $id;        
    public $name;        
    public $description;        
    public $price;   
    public $db;
    
    public function __construct(Db $db){
        $this->db = $db;
    }

    public function getAllProducts(){
        $query = $this->db->queryProducts();
        $result = $this->db->query($query);
        while ($row = $result->fetch()){
            echo '<pre>';
            print_r($row);
        }
    }
}
