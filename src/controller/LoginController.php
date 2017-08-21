<?php

namespace Controller;

use Dao\UserDaoImpl;
use Util\Constants;
use Util\FormValidator;

require('../../vendor/autoload.php');

if ($_POST) {
    login();
} else if (isset($_SESSION['userId'])) {
    header(Constants::REDIRECT_TO_INDEX_HEADER);
}

function login()
{
    session_start();
    $userDao = New UserDaoImpl();
    $errorList = array();
    $user = FormValidator::validateLogin($errorList, $userDao);
    if (!empty($errorList)) {
        $_SESSION['errorList'] = $errorList;
        header(Constants::REDIRECT_TO_LOGIN_HEADER);
    } else {
        $_SESSION['userId'] = $user->getId();
        header(Constants::REDIRECT_TO_INDEX_HEADER);
    }
    exit;
}

function logout()
{

}