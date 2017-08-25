<?php

namespace Controller;

use Dao\UserDaoImpl;
use Entity\User;
use Util\Constants;
use Util\FormValidator;

require('../../vendor/autoload.php');

class RegistrationController
{
    public static function registerUser()
    {
        session_start();
        $errorList = array();
        $userDao = New UserDaoImpl();
        $errorList = FormValidator::validateRegForm($errorList, $userDao);
        if (!empty($errorList)) {
            $_SESSION['errorList'] = $errorList;
            header(Constants::REDIRECT_TO_REGISTRATION_HEADER);
        } else {
            $user = New User();
            $user->setUserName($_POST['username']);
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);
            $user->setActive(true);
            $userId = $userDao->save($user);
            if ($userId > 0) {
                session_start();
                $_SESSION['user'] = $userId;
                header('Location:/index.php');
            }
        }
    }
}


