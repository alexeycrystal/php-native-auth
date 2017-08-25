<?php

namespace Route;

use Controller\LoginController;
use Controller\RegistrationController;
use Util\Constants;

require_once('vendor/autoload.php');
require_once('src/util/views.php');


session_start();
if ($_GET) {
    if (isset($_SESSION['user']) && in_array($_GET["route"], $excludesForLoggedIn)) {
        header('Location:/index.php');
        die();
    }
    if (isset($_GET["route"]) && array_key_exists($_GET["route"], $pages)) {
        header('Location:' . $pages[$_GET["route"]]);
        die();
    } else {
        errorPageNotFound();
    }
} elseif ($_POST) {
    if (isset($_SESSION['user'])) {
        header('Location:/index.php');
        die();
    }
    $route = $_POST["route"];
    if (isset($route) && array_key_exists($route, $pages)) {
        $action = $_POST['route'];
        if (isset($action)) {
            if ($action = 'login') {
                LoginController::login();
            } else if ($action = 'registration') {
                RegistrationController::registerUser();
            }
        }
    } else {
        errorPageNotFound();
    }
} else {
    errorPageNotFound();
}

function errorPageNotFound()
{
    header(Constants::REDIRECT_TO_ERROR_HEADER);
    die();
}

