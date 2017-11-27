<?php

namespace app\controllers;


use app\models\DataEntity;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = ($this->getRepository())->getAll();
        $this->useLayout = false;
        echo $this->render("catalog", ['products' => $products]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = ($this->getRepository())->getOne($id);
        $this->useLayout = false;
        echo $this->render("card", ['product' => $product]);

    }

    private function getRepository()
    {
        return new ProductRepository();
    }
}