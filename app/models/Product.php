<?php
namespace App\Models;
class Product{
	public $name;
	public $price;
	public $quantity;
	
	public function __construct($pname='', $pprice='') {
		$this->name = $pname;
		$this->price = $pprice;
		$this->quantity = rand(1,3);
	}
	
	function setName($name){
        $this->name = $name;  
    }

    function getName(){
        return $this->name;  
    }

    function setPrice($price){
        $this->price = $price;  
    }

    function getPrice(){
        return $this->price;
    }

    function setQuantity($quantity){
        $this->quantity = $quantity;  
    }

    function getQuantity(){
        return $this->quantity;
    }
}
?>