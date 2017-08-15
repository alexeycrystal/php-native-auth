<?php

namespace AuthFormTask;

use Util\FormValidator;

require('../connect.php');

if (isset($_POST['action'])) {
    registerUser();
}

function registerUser()
{
    $errorList = FormValidator::validateRegForm();
    if (!empty($errorList)) {

    } else {

    }
}
