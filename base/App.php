<?php

namespace app\base;

include "../traits/TSingleton.php";

use app\controllers\Controller;
use app\services\Db;
use app\services\Request;
use app\traits\TSingleton;


class ComponentsNotFoundException extends \Exception
{
}

/**
 * Class App
 * @package app\base
 * @property Request request
 * @property Controller mainController
 * @property Db db
 *
 */
class App
{
    use TSingleton;

    public $config;
    /*** @var Storage */
    public $components;

    public static function call()
    {
        return static::getInstance();

    }

    public function run()
    {
        $this->config = include('../config/main.php');
        $this->autoloadRegister();
        $this->components = new Storage();
        $this->mainController->runAction();
    }

    private function autoloadRegister()
    {
        include "../services/Autoloader.php";
        include "../vendor/autoload.php";
        spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

    }

    public function __get($name)
    {
        return $this->components->get($name);
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];

            $className = $params['class'];
            if (class_exists($className)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $reflection->newInstanceArgs($params);
            }
        }
        throw new ComponentsNotFoundException($name);
    }


}