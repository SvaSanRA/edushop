<?php

namespace app\controllers;


use app\models\DataEntity;
use app\models\Product;
use app\models\repositories\ProductRepository;
use app\services\renderers\IRenderer;
use app\services\Request;

class ProductController extends Controller
{
    protected $useLayout = false;


    public function actionIndex()
    {
        $products = ($this->getRepository())->getAll();
        echo $this->render("catalog", ['products' => $products]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = ($this->getRepository())->getOne($id);
        echo $this->render("card", ['product' => $product]);

    }

    public function actionAddNewProduct()
    {
        echo $this->render("add_new_product");
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  if ((new ProductRepository())->createNew($_POST['name'],
                      $_POST['description'],
                      $_POST['price']))
                  {
                      echo "Продукт добавлен успешно";
                      $this->redirect('product');
                      exit;
                  }
              }
    }

    private function getRepository()
    {
        return new ProductRepository();
    }


}