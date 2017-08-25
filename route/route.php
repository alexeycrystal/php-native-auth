<?php

namespace Route;

use Controller\LoginController;
use Controller\RegistrationController;
use Util\Constants;

require_once('../vendor/autoload.php');
require_once('../app/util/views.php');

session_start();
if ($_GET) {
    if (isset($_SESSION['user']) && in_array($_GET["route"], $excludesForLoggedIn)) {
        header(Constants::REDIRECT_TO_INDEX_HEADER);
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
        header(Constants::REDIRECT_TO_INDEX_HEADER);
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

