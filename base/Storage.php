<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 20.11.17
 * Time: 14:35
 */

namespace app\base;


class Storage
{
    protected $items = [];

    public function set($object, $key)
    {
        $this->items[$key] = $object;
    }

    public function get($key)
    {
        if(!isset($this->items[$key])) {
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }

}