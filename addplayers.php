<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    include_once("sql/sql.php");
    #mysqli_autocommit($DB, false);
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
            <a href="logout.php" style="color: rgb(255,255,255);">Logout</a>
        </div>
    </nav>
    <h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px">Add a
        Player<img src="assets/img/wrfc.png" width="100px"></h1>
    <div class="input-group">
        <div class="input-group-prepend"></div>
        <div class="input-group-append"></div>
    </div>
        <form method="post" action="">
            <div class="form-group text-capitalize text-center text-body addTable"
                 style="width: 100%;padding: 25px;margin: 0px;height: 204px;filter: blur(0px) brightness(100%);clear: both;">
                <div class="formSection">
                    <label class="addLabel">
                        First Name:&nbsp;
                    </label>
                    <input type="text" class="addInput" name="FirstName"><br>
                </div>
                <div class="formSection">
                    <label class="addLabel">
                        Last Name:&nbsp;
                    </label>
                    <input type="text" class="addInput" name="LastName"><br>
                </div>
                <div class="formSection">
                    <label class="addLabel">
                        Date of Birth:&nbsp;
                    </label>
                    <input class="addInput" type="date" name="DOB"><br>
                </div>
                <div class="formSection">
                    <label class="addLabel">
                        Member Type:&nbsp;
                    </label>
                    <select class="addSelect" name="MemberType">
                        <option value="0" selected="">Please Select a Membership Type</option>
                        <option value="1">Junior</option>
                        <option value="2">Senior</option>
                        <option value="3">VP</option>
                        <option value="4">Ladies</option>
                        <option value="5">Social</option>
                        <option value="6">Girls</option>
                        <option value="7">Colts</option>
                    </select><br>
                </div>
                <div class="formSection">
                    <label class="addLabel">
                        Contact Type:&nbsp;
                    </label>
                    <select class="addSelect" name="ContactType">
                        <option value="0" selected="">Please Select a Contact Type</option>
                        <option value="1">Email</option>
                        <option value="2">Phone</option>
                    </select><br>
                </div>
                <div class="formSection">
                    <label class="addLabel">
                        Contact Info: &nbsp;
                    </label>
                    <input type="text" class="addInput" name="ContactInfo"><br>
                </div>
                <button class="btn btn-dark" type="submit">Submit</button>
        </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
    $FirstName = $Surname = $DOB = $memberType = $contactType = $contactDetail = $error = $successful1 = "";
    $FirstName = $_POST['FirstName'];
    $Surname = $_POST['Surname'];
    $DOB = $_POST['DOB'];
    $memberType = $_POST['memberType'];
    $contactType = $_POST['contactType'];
    $contactDetail = $_POST['contactDetail'];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "test";
        if (empty(trim($_POST['FirstName']))) {
            $error = "Please enter a First Name.";
        }
        if (empty(trim($_POST['Surname']))) {
            $error = "Please enter a Surname.";
        }
        if (empty($_POST['DOB'])) {
            $error = "Please select Date of Birth.";
        }
        if ($_POST['DOB'] > date("Y/m/d")) {
            $error = "Please enter a valid Date of Birth";
        }
        if ($_POST['memberType'] == "0") {
            $error = "Please select a member type";
        }
        if ($_POST['contactType'] == "0") {
            $error = "Please select a contact type";
        }
        if (empty(trim($_POST['contactDetail']))) {
            $error = "Please enter your contact details";
        }

        if ($contactType = 1) {
            $contactType = "Email";
        } else {
            $contactType = "Telephone Number";
        }
        if ($memberType == 1) {
            $memberType = "Junior";
        } elseif ($memberType == 2) {
            $memberType = "Senior";
        } elseif ($memberType == 3) {
            $memberType = "VP";
        } elseif ($memberType == 4) {
            $memberType = "Ladies";
        } elseif ($memberType == 5) {
            $memberType = "Social";
        } elseif ($memberType == 6) {
            $memberType = "Girls";
        } elseif ($memberType == 7) {
            $memberType = "Colts";
        } else {
        }


        if (empty($error)) {
            $fetchMemberID = "SELECT MemberID FROM tbl_Members ORDER BY MemberID desc LIMIT 1;";
            $result = $DB->query($fetchMemberID);
            $row = $result->fetch_assoc();
            $memberID = $row['MemberID'];
            $memberID = $memberID + 1;
            echo $memberID;


            $fetchContactID = "SELECT ContactID FROM tbl_MemberContact ORDER BY ContactID desc LIMIT 1;";
            $result = $DB->query($fetchContactID);
            $row = $result->fetch_assoc();
            $contactID = $row['ContactID'];
            $contactID = $contactID + 1;
            echo $contactID;

            $qry1 = "INSERT INTO tbl_Members (MemberID, FirstName, Surname, DateOfBirth) VALUES ('$memberID', '$FirstName', '$Surname', '$DOB');";
            $qry2 = "INSERT INTO tbl_MemberContact (MemberID, ContactID, ContactDetail, ContactType) VALUES ('$memberID', '$contactID', '$contactDetail', '$contactType');";
            $qry3 = "INSERT INTO tbl_MemberType (MemberID, MemberType) VALUES ('$memberID', '$memberType');";

            $result = mysqli_query($DB, $qry1);

            if (!$result) {
                $sqlError = false;
                echo "Error: " . mysqli_error($DB) . ".";
            }

            $query = mysqli_query($DB, $qry2);

            if (!$query) {
                $sqlError = false;
                echo "Error: " . mysqli_error($DB) . ".";
            }

            $query = mysqli_query($DB, $qry3);

            if (!$query) {
                $sqlError = false;
                echo "Error: " . mysqli_error($DB) . ".";
            }

        } else {
            echo $error;
        }

    }
} else {
    header("location: login.php");
}
?>