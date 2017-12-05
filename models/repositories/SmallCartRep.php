<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 04.12.17
 * Time: 7:04
 */

namespace app\models\repositories;

use app\traits\TSingleton;

class SmallCartRep extends Repository
{

    /**
     * @var
     *
     */
    protected static $instance;

    /**
     * @return SmallCartRep
     *
     */
    public static function getInstance()

    {
        if (!is_object(static::$instance)) static::$instance = new static;
        return static::$instance;
    }

    public static function setCartData() //записываем в cokies текущее состояние корзины в сериализованном виде
    {
        $cart_content = serialize($_SESSION['cart']);
        setcookie("cart",$cart_content, time()+3600*24*365);

    }

    public function getCokieCart()
    {
        if (isset($_COOKIE)) {
            $_SESSION['cart']=unserialize(stripslashes($_COOKIE['cart'])); //десиарилизуем строку в массив
            return true;
        }
        return false;
    }

    public function getCartData()
    {
        $res['cart_count']=0;
        $res['cart_price']=0;
        if ($this->getCokieCart() && $_SESSION['cart'])
        {
            $total_price=0;
            $total_count=0;
            foreach ($_SESSION['cart'] as $id=>$count){
                $result=$this->conn->fetchOne("SELECT price FROM product WHERE id=?",[$id]);
                $total_price+=$result['price']*$count;
                $total_count+=$count;
            }
            $res['cart_count']=$total_count;
            $res['cart_price']=$total_price;
        }
        return $res;
    }
}