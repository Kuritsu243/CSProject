<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    include_once("sql/sql.php");
    $MemberID = $_SESSION['MemberID'];
    $FirstName = $_SESSION['FirstName'];
    $Surname = $_SESSION['Surname'];
    $DateOfBirth = $_SESSION['DateOfBirth'];
    $ContactType = $_SESSION['ContactType'];
    $ContactDetail = $_SESSION['ContactDetail'];
    $MemberType = $_SESSION['MemberType'];


    ?>
    <!DOCTYPE html>
    <html>
    <head> <!---- sets headers ---->
        <meta charset="utf-8"><!---- sets charset ---->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!---- sets content of webpage to viewing res ---->
        <title>WRFC DBMS</title> <!---- title of webpage ---->
        <meta property="og:type" content="website"> <!---- I don't know what this does ---->
        <meta name="description" content="The Database Management System for Withycombe Rugby Club">
        <!---- Webpage description ---->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> <!---- Load bootstrap css ---->
        <link rel="stylesheet" href="assets/css/styles.css"> <!---- Load custom styles ---->
        <script src="assets/js/jquery.min.js"></script> <!---- Load Jquery js ---->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script> <!---- Load bootstrap js ---->
        <script src="js/editModal.js"></script> <!---- modal show --->
    </head> <!---- stops setting headers ---->

<body style="background-color: rgb(27,140,23);"> <!---- Background colour --->
<nav class="navbar navbar-light navbar-expand-md" style="background-color: #000000;color: rgb(255,255,255);">
    <!---- Navbar --->
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
<h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px">
    <!----- logo ---->
    View Members <!----- header ---->
    <img src="assets/img/wrfc.png" width="100px"> <!----- logo again ---->
</h1>

<form id="confirmDelete" method="post">
    <h3>Are you sure you want to delete member <?php echo $_SESSION['FirstName'], $_SESSION['Surname'] ?> with Member ID <?php echo $_SESSION['MemberID'] ?>?</h3>

    <br/>
    <button type="submit" name="updateBtn" id="updateBtn" value="Update" class="btn btn-success">
        Confirm
    </button>
    <button type="submit" name="cancelBtn" id="cancelBtn" value="cancel" class="btn btn-danger">
        Cancel
    </button>
</form>
    <?php
    if (isset($_POST['updateBtn'])) {
        deleteFields($DB);
        redirect('findplayers.php');
    }
    if (isset($_POST['cancelBtn'])) {
        redirect('findplayers.php');
    }
} else {
    header("location: login.php");
    exit();
}

?>