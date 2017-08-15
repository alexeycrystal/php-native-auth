<?php

namespace Dao;

interface UserDao
{
    function get(int $int);

    function isUserNameExists(string $userName);

    function isEmailExists(string $email);

    function registerUser();
}