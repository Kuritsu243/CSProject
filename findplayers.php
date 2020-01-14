<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    include_once("sql/sql.php");
    if (isset($_GET['search'])) {
        $name = $_GET['search'];
        $sql = "SELECT * FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE (tbl_Members.FirstName LIKE '%{$name}%' OR tbl_Members.Surname LIKE '%{$name}%' OR tbl_Members.DateOfBirth LIKE '%{$name}%' OR tbl_MemberContact.ContactDetail LIKE '%{$name}%' OR tbl_MemberContact.ContactType LIKE '%{$name}%')";

    }
?>


<!DOCTYPE html>
<html>
<head> <!---- sets headers ---->
    <meta charset="utf-8"><!---- sets charset ---->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"> <!---- sets content of webpage to viewing res ---->
    <title>WRFC DBMS</title> <!---- title of webpage ---->
    <meta property="og:type" content="website"> <!---- I don't know what this does ---->
    <meta name="description" content="The Database Management System for Withycombe Rugby Club"> <!---- Webpage description ---->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> <!---- Load bootstrap css ---->
    <link rel="stylesheet" href="assets/css/styles.css"> <!---- Load custom styles ---->
    <script src="assets/js/jquery.min.js"></script> <!---- Load Jquery js ---->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script> <!---- Load bootstrap js ---->
    <script src="js/editModal.js"></script> <!---- modal show --->
</head> <!---- stops setting headers ---->

<body style="background-color: rgb(27,140,23);"> <!---- Background colour --->
<nav class="navbar navbar-light navbar-expand-md" style="background-color: #000000;color: rgb(255,255,255);"> <!---- Navbar --->
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
<h1 class="text-center" style="padding: 8px;color: rgb(0,0,0);"><img src="assets/img/wrfc.png" width="100px"> <!----- logo ---->
    View Members <!----- header ---->
    <img src="assets/img/wrfc.png" width="100px"> <!----- logo again ---->
</h1>
<form method="get"> <!----- Search form ---->
    <p class="text-center nameID" style="color: rgb(0,0,0);font-size: 24px;">
        Please search for a member using any of their details:&nbsp;
        <input class="form-control-sm" type="text" style="padding: 0px;margin: 0px;" name="search"> <!----- input box ---->
        <button class="btn btn-dark btn-sm" type="submit" name="btn" style="padding: 4px;margin: 5px;">Search <!----- search button ---->
        </button>
    </p>
</form> <!----- end search form ---->
</body>
</html>


<?php
if (isset($_GET['search'])) { #if search button has been clicked - using GET method
    $result = $DB->query($sql); #sets results from the query to variable re sult
    echo mysqli_error($DB); #if there's an error then output
    if ($numrows = mysqli_num_rows($result) > 0) { #if there are more than 0 rows in result
        ?>
        <div class='SQL_Table'>
        <table class='table table-striped'> <!--- output row names --->
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>DateOfBirth</th>
            <th>Contact Type</th>
            <th>Contact Detail</th>
            <th>Member Type</th>
            <th>Actions</th>
        </tr>
        <tr>
        <?php
    }
while ($row = mysqli_fetch_array($result)) { #whilst variable row is equal to a row of results
    ?>

    <td><?php echo $row["FirstName"] ?></td> <!--- echo firstname --->
    <td><?php echo $row["Surname"] ?></td> <!--- echo surname --->
    <td><?php echo $row["DateOfBirth"] ?></td> <!--- echo dateofbirth --->
    <td><?php echo $row["ContactType"] ?></td> <!--- echo contacttype --->
    <td><?php echo $row["ContactDetail"] ?></td> <!--- echo contact detail --->
    <td><?php echo $row["MemberType"] ?></td> <!--- echo member type --->
    <td>
        <form method='post'> <!--- Hidden form with the values --->
            <input type="hidden" name="MemberID" value='<?php echo $row["MemberID"]; ?>'/>
            <input type='hidden' name='FirstName' value='<?php echo $row["FirstName"]; ?>'/>
            <input type='hidden' name='Surname' value='<?php echo $row["Surname"]; ?>'/>
            <input type='hidden' name='DateOfBirth' value='<?php echo $row["DateOfBirth"]; ?>'/>
            <input type='hidden' name='ContactType' value='<?php echo $row["ContactType"]; ?>'/>
            <input type='hidden' name='ContactDetail' value='<?php echo $row["ContactDetail"]; ?>'/>
            <input type='hidden' name='MemberType' value='<?php echo $row["MemberType"]; ?>'/>
            <button name='editBtn' value='Edit' id='<?php echo $row["MemberID"]; ?>' class="btn btn-primary edit_data" data-toggle="modal" data-target="#add_data_Modal" style="font-size: 13px;"> <!--- edit button --->
                Edit
            </button>
            <button class="btn btn-danger" name="deleteBtn" value="Delete" id="<?php echo $row["MemberID"]; ?>"> <!--- delete button --->
                Delete
            </button>
        </form>
    </td>
    </tr>

    <?php
}
    ?>

    </table>
    </div>
    <?php
}
if (isset($_POST['deleteBtn'])) {
    $_SESSION['MemberID'] = $_POST['MemberID'];
    $_SESSION['FirstName'] = $_POST['FirstName'];
    $_SESSION['Surname'] = $_POST['Surname'];
    $_SESSION['DateOfBirth'] = $_POST['DateOfBirth'];
    $_SESSION['ContactType'] = $_POST['ContactType'];
    $_SESSION['ContactDetail'] = $_POST['ContactDetail'];
    $_SESSION['MemberType'] = $_POST['MemberType'];
    redirect('deleteplayers.php');
}
if (isset($_POST['editBtn'])) { #if edit button has been clicked
    $_SESSION['MemberID'] = $_POST['MemberID'];
    $_SESSION['FirstName'] = $_POST['FirstName'];
    $_SESSION['Surname'] = $_POST['Surname'];
    $_SESSION['DateOfBirth'] = $_POST['DateOfBirth'];
    $_SESSION['ContactType'] = $_POST['ContactType'];
    $_SESSION['ContactDetail'] = $_POST['ContactDetail'];
    $_SESSION['MemberType'] = $_POST['MemberType'];
    redirect('editplayers.php');
}

    }
    else {
        header("location: login.php");
        exit();
    }
    ?>
