<?php
namespace App\Models;
/*spl_autoload_register(function($class_name){
	include __DIR__ .$class_name.".php";
});*/
require __DIR__ . '/User.php';
$user = new \App\Models\User;
$user->full_name = "John Doe";
$user->email = "john.doe@example.com";

require __DIR__ . '/Product.php';
$product_one = new \App\Models\Product("Apple",4.95);
$product_two = new \App\Models\Product("Orange",3.99);

require __DIR__ . '/Cart.php';
$cart = new \App\Models\Cart();
$cart->setCart($product_one);
$cart->displayProducts();
$cart->setCart($product_two);
$cart->displayProducts();

$shoppingCart = array();
$cart->setShoppingCart($shoppingCart);
$cart->addProducts($product_one, $product_two);

$cart->setShoppingCart($shoppingCart);
$cart->deleteFromCart();

$cart->setCart($product_one);
$a = $cart->calculateEachProductPrice();
$cart->setCart($product_two);
$b = $cart->calculateEachProductPrice();

$shoppingCart = array($product_one,$product_two);
$cart->calculateTotalPrice($product_one, $product_two);

$shoppingCart = array($product_one,$product_two);
$cart->calculateTotalPriceAfterRemovingProduct($product_one, $product_two);
?>