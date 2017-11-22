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


}