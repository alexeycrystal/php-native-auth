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
    $errorList = FormValidator::validateRegForm();
    if (!empty($errorList)) {
        foreach ($errorList as $error) {
            echo $error;
        }
    } else {
        $userDao = New UserDaoImpl();
        $user = New User();
        $user->setUserName($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setActive(true);
        $userId = $userDao->save($user);
        if ($userId > 0) {
            session_start();
            $_SESSION['user'] = $userId;
            header('Location: index.php');
        }
    }
}
