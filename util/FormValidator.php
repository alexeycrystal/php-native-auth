<?php
/**
 * Created by PhpStorm.
 * User: Shabramov.O.O
 * Date: 15.08.2017
 * Time: 11:21
 */

namespace Util;

class FormValidator
{
    private static const ILLEGAL_SYMBOLS = "#$%^&*()+=-[]';,./{}|:<>?~";

    public static function &validateRegForm(): array
    {
        $errorList = array();
        $email = $_POST['email'];
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $secondaryPassword = $_POST['secondaryPassword'];
        if (!isset($userName)) {
            array_push($errorList, Constants::ERROR_EMPTY_USERNAME);
        } else if (preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $userName)) {
            array_push($errorList, Constants::ERROR_USERNAME_INCORRECT_SYMBOLS);
        }

        if (!isset($password)) {
            array_push($errorList, Constants::ERROR_EMPTY_PASSWORD);
        } else if (!isset($secondaryPassword)) {
            array_push($errorList, Constants::ERROR_EMPTY_SECONDARY_PASSWORD);
        } else if (!strcmp($password, $secondaryPassword)) {
            array_push($errorList, Constants::ERROR_PASSWORDS_NOT_MATCH);
        }

        if (!isset($email)) {
            array_push($errorList, Constants::ERROR_EMPTY_EMAIL);
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errorList, Constants::ERROR_INCORRECT_EMAIL);
        }
        return $errorList;
    }
}