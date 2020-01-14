<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    include_once("sql/sql.php");

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
<?php echo $_SESSION['MemberType'] ?>
<h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px">
    <!----- logo ---->
    View Members <!----- header ---->
    <img src="assets/img/wrfc.png" width="100px"> <!----- logo again ---->
</h1>
<form method="post" id="insert_form" class="updateForm">
    <input type="hidden" name="updateMemberID" id="updateMemberID" class="form-control">
    <label>First Name</label>
    <input type="text" name="updateFirstName" id="updateFirstName" class="form-control"
           value="<?php echo $_SESSION['FirstName'] ?>"/>
    <br/>
    <label>Last Name</label>
    <input type="text" name="updateSurname" id="updateSurname" class="form-control"
           value="<?php echo $_SESSION['Surname'] ?>"/>
    <br/>
    <label>Date Of Birth</label>
    <input id="updateDateOfBirth" name="updateDateOfBirth" type="date" class="form-control"
           value="<?php echo $_SESSION['DateOfBirth'] ?>"/>
    <br/>
    <label>Contact Type</label>
    <select name="updateContactType" id="updateContactType" class="form-control">
        <option value="<?php if ($_SESSION['ContactType'] = "Email") {
            echo 'selected="selected';
        } ?>">Email
        </option>
        <option value="<?php if ($_SESSION['ContactType'] = "TelNo") {
            echo 'selected="selected';
        } ?>">Telephone No.
        </option>
    </select>
    <br/>
    <label>Contact Info</label>
    <input type="text" name="updateContactDetail" id="updateContactDetail" class="form-control"
           value="<?php echo $_SESSION['ContactDetail'] ?>"/>
    <br/>
    <label>Member Type</label>
    <?php
    if ($_SESSION['MemberType'] = "Senior") {
        SeniorOutput();
    } elseif ($_SESSION['MemberType'] = "VP") {
        VPOutput($DB);
    } elseif ($_SESSION['MemberType'] = "Ladies") {
        LadiesOutput($DB);
    } elseif ($_SESSION['MemberType'] = "Social") {
        SocialOutput();
    } elseif ($_SESSION['MemberType'] = "Girls") {
        GirlsOutput($DB);
    } elseif ($_SESSION['MemberType'] = "Colts") {
        ColtsOutput($DB);
    }

    ?>
    <br/>
    <button type="submit" name="updateBtn" id="updateBtn" value="Update" class="btn btn-success">
        Submit
    </button>
    <button type="submit" name="cancelBtn" id="cancelBtn" value="cancel" class="btn btn-danger">
        Cancel
    </button>
</form>
    <?php
    if (isset($_POST['updateBtn'])) {
        updateFields($DB);
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