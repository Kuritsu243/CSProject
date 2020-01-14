<?php
session_start(); //Stars session
if (isset($_SESSION['login']) && $_SESSION['login'] === true) { //Checks if logged in
    header("location: usrpage.php"); //if so redirects you to usrpage
}
require_once "sql/sql.php";
$username = $password = "";
$username_err = $password_err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username']))) {
        $username_err = "<br>Please enter username";
    } else {
        $username = trim($_POST['username']);
    }
    if (empty(trim($_POST['password']))) {
        $password_err = "<br>Please enter password";
    } else {
        $password = trim($_POST['password']);
    }
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username=?";
        if ($stmt = mysqli_prepare($DB, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION['login'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            header("location: usrpage.php");
                        } else {
                            $password_err = "<br>The password you entered was invalid";
                        }
                    }
                } else {
                    $username_err = "<br>No account found with that username";
                }

            } else {
                echo "<br>Oops! Something went wrong; please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($DB);
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WRFC DBMS</title>
    <meta property="og:type" content="website">
    <meta name="description" content="The Database Management System for Withycombe Rugby Club">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: rgb(27,140,23);">
<h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px">Welcome to
    the WRFC DBMS!<img src="assets/img/wrfc.png" width="100px"></h1>
<div class="login">
    <form method="post">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 text-center">
                <h4>Please fill in your credentials to login</h4>
                <div class="form-group-center <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username:</label><br>
                    <label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    </label>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group-center <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password:</label><br>
                    <label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    </label>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group-center"><br>
                    <button class="btn btn-primary text-center" type="submit">Login</button>
                    <a class="btn btn-info text-center" type="button" href="register.php" >Register</a>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>