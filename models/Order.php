<?php

namespace app\models;


class Order extends Model
{
    public $id;
    public $cartId;
    public $deliveryPrice; //Стоимость доставки
    public $discount;
    public $totalOrderPrice;

    public function __construct($id = null, $cartId = null, $deliveryPrice = null, $discount = null, $totalOrderPrice = null)
    {
     	parent::__construct();
     	$this->id 				= $id;
     	$this->cartId			= $cartId;
     	$this->deliveryPrice	= $deliveryPrice;
     	$this->discount			= $discount;
     	$this->$totalOrderPrice = $totalOrderPrice;
    }

    public function getTableName()
    {
    	return "order";
    }
}

