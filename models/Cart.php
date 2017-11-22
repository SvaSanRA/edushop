<?php
namespace app\models;

class Cart extends Model {
	
	public $id;
	public $godsIdPriceList; //Массив где ключи - это $id товара, а значения - $price товара
    public $totalGoodsPrice; //Общая стоимость товаров в заказе

    public function __construct($id = null, $godsIdPriceList = null, $totalGoodsPrice = null)
    {
    	parent::__construct();
    	$this->id 				= $id;
    	$this->godsIdPriceList 	= $godsIdPriceList;
    	$this->totalGoodsPrice	= $totalGoodsPrice;
    }

    public function getTableName() { //Возможно товары в корзине будут храниться в кэше (а не в БД). Т.е. нужно использовать функции memcache или подобные.
    	return "cart";
    }
}
?>