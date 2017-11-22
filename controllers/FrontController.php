<?php
namespace app\controllers;


use app\base\App;
use app\models\User;


//use app\services\renderers\TemplateRenderer;


class RedirectException extends \Exception
{
}

class FrontController extends Controller
{
    private $controller;
    private $action;
    private $defaultController = "Product";

    public function actionIndex()
    {
        /*$sapi = php_sapi_name();
        echo $sapi."<br>";*/

        $rm = App::call()->request;

        $controllerName = $rm->getControllerName() ?: $this->defaultController;
        $this->action = $rm->getActionName();
        $this->controller = App::call()->config['controller_namespaces']. ucfirst($controllerName) . "Controller";
        $this->checkLogin();

        $controller = new $this->controller(
            new \app\services\renderers\TemplateRenderer()
        );

        $controller->runAction($this->action);
    }

    private function checkLogin()
    {
        session_start();
        if ($this->controller != "\\" . AuthController::class) {
            $user = (new User())->getCurrent();
            if (!$user) {
                $this->redirect('auth');
            }
        }
    }

}