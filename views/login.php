<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Please Login</h2>
    <?php if (isset($smsg)) { ?>
        <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
    <?php if (isset($fmsg)) { ?>
        <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a class="btn btn-lg btn-primary btn-block" href="registration.php">Register</a>
</form>
</body>
</html>

