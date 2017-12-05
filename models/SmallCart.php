<?php
namespace app\models;

class SmallCart extends DataEntity {

	public $id;
	public $productsList; //Массив где ключи - это $id товара, а значения - колличество товара

    public function __construct($id = null, $productsList = null)
    {
    	parent::__construct();
    	$this->id 				= $id;
    	$this->productsList 	= $productsList;
    }

    public function getTableName() {
    	return "cart";
    }

    public function addToCart($productId, $count=1)
    {
        $_SESSION['cart'][$productId] = $_SESSION['cart'][$productId] + $count;
        return true;
    }

    public function clearCart()
    {
        unset($_SESSION['cart']);
    }

    public function deleteFromCart($productId, $count=1){}

}
?>