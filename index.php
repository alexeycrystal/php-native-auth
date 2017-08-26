<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Sign-Up & Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="resources/assets/sign-up-login-form/css/style.css">
</head>
<body>
<div class="form">
<?php
session_start();
if (isset($_SESSION['user'])) {
    include_once('resources/views/logged.php');
} else {
    include_once('resources/views/loginAndRegistration.php');
}
?>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="resources/assets/sign-up-login-form/js/index.js"></script>
</body>
</html>
