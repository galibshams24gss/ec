<?php
namespace App\Models;
class Cart{
	private $pr = array();
	private $prd = array();
	private $products;
	private $user;
		
	function setCart(Product $pr) {
		$this->pr[] = $pr;
	}
	
	function setShoppingCart(array $prd) {
		$this->prd[] = $prd;
	}
	
	//Display Products
	function displayProducts() {
		$item = "";
		foreach ($this->pr as $pr)
		{
			$item = "..............>>DISPLAY PRODUCT<<...............<br/>";
			$item .= "Product Name: $pr->name<br/>";
			$item .= "Product Unit Price: $$pr->price<br/>";
		}
		echo $item;
	}
	
	//Add Products to Shopping Cart
	function addProducts($product1, $product2) {
		array_push($this->prd, $product1, $product2);
		echo "<p> My Shopping Cart (Product Name, Price & Quantity as List):</p>";
		echo '<pre>';
		foreach($this->prd as $p){
			foreach($p as $q){
			echo $q ."\n";
		  }
		}
		echo '</pre>';
	}
	
	//Delete Products from Shopping Cart
	function deleteFromCart() {
		foreach($this->prd as $key => $prd){
			unset($this->prd[$key]);
		}
		echo "<p>Products Deleted From Cart!</p>";
	}
	
	//Calculate Each Product's Price
	function calculateEachProductPrice(){
		echo "..................>>CART-PRODUCT DETAILS>>...............<br/>";
		$mycart = "";
		foreach ($this->pr as $pr)
		{
			$mycart = "Product Name: $pr->name <br/>";
			$mycart .= "Product Price:  $" .$pr->price*$pr->quantity ."<br/>";
		}
		echo $mycart;
	}
	
	//Calculate Total Price
	function calculateTotalPrice($prod1, $prod2){
		echo "..................>>TOTAL PRICE<<...............<br/>";
		$this->prd = array($prod1, $prod2);
		$sum = 0;
		$total = "";
		foreach ($this->prd as $pr)
		{
			$sum += $pr->price*$pr->quantity;
			$total = "Total Price:  $" .$sum ."<br/>";
		}
		echo $total;
	}

	//Calculate Total Price After Removing Specific Quantity
	function calculateTotalPriceAfterRemovingProduct($prod1, $prod2){
		echo "..................>>TOTAL PRICE After REDUCING Specific Quantity<<...............<br/>";
		$this->prd = array($prod1, $prod2);
		$sum = 0;
		$total = "";
		foreach ($this->prd as $pr)
		{
			$sum += $pr->price*($pr->quantity - 1);
			$total = "Total Price:  $" .$sum ."<br/>";
		}
		echo $total;
	}
}
?>