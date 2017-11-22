<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 04.11.17
 * Time: 10:40
 */

namespace app\controllers;


class UserController extends Controller
{
    public function actionIndex()
    {
        echo "UserInfo";
    }

    public function actionUser()
    {
        $id = $_GET['id'];
        $user = User::getOne($id);
        $this->useLayout = true;
        echo $this->render("user-info", ['user-info' => $user]);
    }
}