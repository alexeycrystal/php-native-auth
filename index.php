<html>
<head>
    <title>Auth form - main page</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['user'])) {
    echo '<a class="btn btn-lg btn-primary btn-block" href="route.php?route=logout">Logout</a>';
} else {
    echo '<a class="btn btn-lg btn-primary btn-block" href="route.php?route=login">Login</a>';
    echo '<a class="btn btn-lg btn-primary btn-block" href="route.php?route=registration">Registration</a>';
}
?>
</body>
</html>
