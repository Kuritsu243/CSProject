<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
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
<nav class="navbar navbar-light navbar-expand-md" style="background-color: #000000;color: rgb(255,255,255);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: rgba(255,255,255,0.9);">WRFC DBMS</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="viewmembers.php"
                       style="color: #ffffff;margin: 2px;padding: 8px;font-weight: normal;">View Members</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="addplayers.php"
                       style="color: #ffffff;margin: 2px;padding: 8px;font-weight: bold;">Add Players</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#" style="color: #ffffff;margin: 2px;padding: 8px;">Edit a Player</a>
                </li>
            </ul>
            <a href="#" style="color: #ffffff;margin: 2px;padding: 8px;">Find a Player</a>
            <a href="#" style="color: #ffffff;margin: 2px;padding: 8px;">View Upcoming Matches</a>
        </div>
        <a href="#" style="color: rgb(255,255,255);">Logout</a>
    </div>
</nav>
    <h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px">Welcome to the WRFC DBMS!<img src="assets/img/wrfc.png" width="100px"></h1>
    <p class="text-center nameID" style="color: rgb(0,0,0);font-size: 24px;"><?php echo 'You are currently logged in as ' . $_SESSION['username'] . ' with userID ' . $_SESSION['id']; ?></p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>


    <?php
} else {
    header("location: login.php");
}
?>