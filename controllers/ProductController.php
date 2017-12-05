<?php

namespace app\controllers;

use app\models\repositories\SmallCartRep;
use app\models\SmallCart;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    protected $useLayout = true;


    public function actionIndex()
    {
        $products = ($this->getRepository())->getAll();
        $small_cart = ($this->getCart()->getCartData());
        var_dump($small_cart);

        echo $this->render("catalog", ['products' => $products,
            'small_cart'=> $small_cart]);


    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = ($this->getRepository())->getOne($id);
        echo $this->render("card", ['product' => $product]);

    }

    public function actionAddNewProduct()
    {
        echo $this->render("add-new-product");
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  if ((new ProductRepository())->createNew($_POST['name'],
                      $_POST['description'],
                      $_POST['price']))
                  {
                      $this->redirect('product');
                      exit;
                  }
              }
    }

    public function actionAddInCart()
    {
        if ($_REQUEST['in-cart-product-id'])
        {
            $cart = new SmallCart();
            //var_dump($cart);
            $cart->addToCart($_REQUEST['in-cart-product-id']);
            SmallCartRep::getInstance()->setCartData();
            header('Location: /product');
            exit;
        }

    }

    public function actionClearCart()
    {
        unset($_SESSION['cart']);
        header('Location: /product');
        exit;
    }

    private function getRepository()
    {
        return new ProductRepository();
    }

    private function getCart()
    {
        return SmallCartRep::getInstance();
    }

}