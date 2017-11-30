<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 06.11.17
 * Time: 6:19
 */

namespace app\models\repositories;

use app\models\Product;



class ProductRepository extends Repository
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "product";
        $this->entityClass = Product::class;
    }

    public function createNew($name, $description, $price)
    {
        return $this->conn->execute("INSERT INTO product(name, description, price) VALUE (?, ?, ?)",
            [$name, $description, $price]);
    }


}