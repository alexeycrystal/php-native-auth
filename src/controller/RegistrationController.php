<?php

namespace Controller;

require('../../vendor/autoload.php');

use Dao\UserDaoImpl;
use Entity\User;
use Util\FormValidator;

if ($_POST) {
    registerUser();
}

function registerUser()
{
    $userDao = New UserDaoImpl();
    $errorList = FormValidator::validateRegForm($userDao);
    if (!empty($errorList)) {
        foreach ($errorList as $error) {
            echo $error;
        }
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
            die();
        }
    }
}
