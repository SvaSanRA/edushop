<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 06.11.17
 * Time: 19:14
 */

namespace app\models\repositories;


class QueryHelper
{
    public function getCreateQuery($table_name, $data)
    {
        return "INSERT INTO `{$table_name}` (" . $this->addParams($data, "`%key%`", ", ") . ")
                        VALUES (" . $this->addParams($data, ":%key%", ", ") . ");";
    }

    public function getReadQuery($table_name, $columns=[], $params=[], $filter=null)
    {
        $sql = "SELECT " . (empty($columns) ? '*' : $this->addParams($columns, "`%value%`", ", "))
            . " FROM `{$table_name}`";
        if (!empty($params))
        { $sql .= " WHERE " . $this->addParams($params, " `%key%` = :%key%", " AND"); }
        $sql .= (is_null($filter) ? '' : " {$filter}") . ";";
        return $sql;
    }

    public function getUpdateQuery($table_name, $params, $data, $filter=null)
    {
        return "UPDATE `{$table_name}`
                        SET " . $this->addParams($data, "`%key%` = :%key%", ", ")
            . " WHERE " . $this->addParams($params, "`%key%` = :%key%", " AND")
            . (is_null($filter) ? '' : $filter) . ";";
    }

    public function getDeleteQuery($table_name, $params=[])
    {
        $sql = "DELETE FROM `{$table_name}`";
        if (!empty($params))
        { $sql .= " WHERE " . $this->addParams($params, "`%key%` = :%key%", " AND"); }
        $sql .= ";";
        return $sql;
    }

    private function addParams($params, $template, $glue)
    {
        foreach ($params as $key => $value)
        { $str .= str_replace(['%key%', '%value%'], [$key, $value], $template) . $glue; }
        return rtrim($str, $glue);
    }


}