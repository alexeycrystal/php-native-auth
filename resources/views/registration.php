<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="../../route/route.php" class="form-signin" method="POST">
    <h2 class="form-signin-heading">Please Register</h2>
    <?php require '../views/errors.php'; ?>
    <div class="input-group">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required
           autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Your password"
           required>
    <label for="secondaryPassword" class="sr-only">Secondary Password</label>
    <input type="password" name="secondaryPassword" id="secondaryPassword" class="form-control"
           placeholder="Type your password again" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <a class="btn btn-lg btn-primary btn-block" href="login.php?route=login">Login</a>
    <input name="route" type="hidden" value="registration"/>
</form>
</body>
</html>
