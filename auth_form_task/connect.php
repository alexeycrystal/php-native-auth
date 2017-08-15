<?php
$connection = mysqli_connect('localhost', 'root', '111111');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'php_auth_task');
if (!$select_db) {
    die("Database Selection Failed" . mysqli_error($connection));
}