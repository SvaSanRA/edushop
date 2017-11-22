<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 12.11.17
 * Time: 14:06
 */

namespace app\services;


use app\models\repositories\SessionsRep;
use app\models\repositories\UserRep;
use app\models\User;

class Auth
{
    protected $sessionKey = 'sid';

    public function login($login, $pass)
    {
        echo "loginFunction";

       if (!$user = (new UserRep())->getByLoginPass($login, $pass)) {
            return false;
        }
        $this->openSession($user);
        return true;
    }

    public function openSession(User $user)
    {
        $sid = $this->generateStr();

        (new SessionsRep())->createNew($user->id, $sid, date("Y-m-d H:m:s"));
        $_SESSION[$this->sessionKey] = $sid;
    }

    private function generateStr($length = 10)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
    }

    public function getSessionId()
    {
        $sid = $_SESSION[$this->sessionKey];
        //делаем обновление $sid на случай если его свистнут
        if (!is_null($sid)) {
            (new SessionsRep())->updateLastTime($sid);
        }
        return $sid;
    }
}