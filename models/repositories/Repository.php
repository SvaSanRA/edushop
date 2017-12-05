<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 06.11.17
 * Time: 5:37
 */

namespace app\models\repositories;

use app\base\App;
use app\services\Db;
use app\models\DataEntity;
use app\models\repositories\QueryHelper;


abstract class Repository
{

    protected $tableName;
    protected $entityClass;

    protected $conn;
    /**
     * DataGetter constructor.
     * @param $db
     */

    public function __construct()
    {
        $this->conn = App::call()->db;
    }


    public function getOne($id)
    {
        return $this->conn->fetchObject(
            "SELECT * FROM {$this->tableName} WHERE id = :id",
            [':id' => $id],
            get_called_class()
        );
    }

    public function getAll()
    {
        return $this->conn->fetchAll("SELECT * FROM {$this->tableName}");
    }

    public function create(DataEntity $entity)
    {
           /* $sql = new QueryHelper();
            return $this->conn->fetchOne("{$sql->getCreateQuery($this->tableName,$this->entityClass)}");*/
    }

    public function update(DataEntity $entity,$id)
    {
        /*$sql = new QueryHelper();
        return $this->conn->fetchAll("{$sql->getUpdateQuery($this->tableName, $id,$this->entityClass)}");*/
    }

    public function delete(DataEntity $entity)
    {
        /*$sql = new QueryHelper();
        return $this->conn->fetchAll("{$sql->getDeleteQuery($this->tableName,$this->entityClass)}");*/
    }

    private static function getDb()
    {
        return Db::getInstance();
    }

}