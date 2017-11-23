<?php
class CartTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function thatCase1(){
        $product1 = new \App\Models\Product;
        $p = $product1->setPrice(4.95);
        $q = $product1->setQuantity(2);
        $pq = $p*$q;
        $product2 = new \App\Models\Product;
        $r = $product2->setPrice(3.99);
        $s = $product2->setQuantity(1);
        $rs = $r*$s;
        $pr = $pq+$rs;
        $cart = new \App\Models\Cart;
        $this->assertInstanceOf('\App\Models\Product', $product1);
        $this->assertInstanceOf('\App\Models\Product', $product2);
        $cart->setShoppingCart([$pq,$rs]);
        $this->assertEquals($pr,$cart->calculateTotalPrice($product1,$product2));
    }

    /** @test */
    public function thatCase2(){
        $prod1 = new \App\Models\Product;
        $p = $prod1->setPrice(4.95);
        $q = $prod1->setQuantity(3);
        $pq = $p*$q;
        $prod2 = new \App\Models\Product;
        $r = $prod2->setPrice(0);
        $s = $prod2->setQuantity(0);
        $rs = $r*$s;
        $pr = $pq+$rs;
        $cart = new \App\Models\Cart;
        $this->assertInstanceOf('\App\Models\Product', $prod1);
        $this->assertInstanceOf('\App\Models\Product', $prod2);
        $cart->setShoppingCart([$pq,$rs]);
        $this->assertEquals($pr,$cart->calculateTotalPriceAfterRemovingProduct($prod1,$prod2));
    }
}
?>