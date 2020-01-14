<?php

$DB = mysqli_connect("localhost", 'phpmyadmin', 'Charlie243', 'WRFC');

if ($DB === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


function Junior($DB)
{
    $result = "";
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Junior'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}


function Senior($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Senior'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}


function VP($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'VP'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}

function Ladies($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Ladies'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}


function Social($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Social'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}

function Girls($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Girls'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}


function Colts($DB)
{
    $sql = "SELECT tbl_Members.FirstName, tbl_Members.Surname, tbl_Members.DateOfBirth, tbl_MemberContact.ContactDetail, tbl_MemberContact.ContactType, tbl_MemberType.MemberType FROM (tbl_Members INNER JOIN tbl_MemberContact ON tbl_MemberContact.MemberID = tbl_Members.MemberID) INNER JOIN tbl_MemberType ON tbl_Members.MemberID = tbl_MemberType.MemberID WHERE tbl_MemberType.MemberType = 'Colts'";
    $result = $DB->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='SQL_Table'><table><tr><th>Name</th><th>Surname</th><th>DateOfBirth</th><th>Contact Type</th><th>Contact Detail</th><th>Member Type</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["FirstName"] . "</td><td> " . $row["Surname"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ContactType"] . "</td><td>" . $row["ContactDetail"] . "</td><td>" . $row["MemberType"] . "</td></tr></div>";
        }
        echo "</table>";
    }
}

function JuniorOutput()
{
    if ($_SESSION['MemberType'] = "Junior") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" selected="selected">Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5">Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';
    }
}

function SeniorOutput()
{
    if ($_SESSION['MemberType'] = "Senior") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2" selected="selected">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5">Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';
    }
}

function VPOutput()
{
    if ($_SESSION['MemberType'] = "VP") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3" selected="selected">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5">Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';
    }
}

function LadiesOutput()
{
    if ($_SESSION['MemberType'] = "Ladies") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4" selected="selected">Ladies</option>';
        echo '<option value="5">Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';
    }
}

function SocialOutput()
{
    if ($_SESSION['MemberType'] = "Social") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5" selected="selected">Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';
    }
}

function GirlsOutput()
{
    if ($_SESSION['MemberType'] = "Girls") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5" >Social</option>';
        echo '<option value="6" selected="selected">Girls</option>';
        echo '<option value="7">Colts</option>';
        echo '</select>';

    }
}

function ColtsOutput()
{
    if ($_SESSION['MemberType'] = "Colts") {
        echo '<select name="updateMemberType" id="updateMemberType" class="form-control">';
        echo '<option value="0">Please Select a Membership Type</option>';
        echo '<option value="1" Junior</option>';
        echo '<option value="2">Senior</option>';
        echo '<option value="3">VP</option>';
        echo '<option value="4">Ladies</option>';
        echo '<option value="5" >Social</option>';
        echo '<option value="6">Girls</option>';
        echo '<option value="7" selected="selected">Colts</option>';
        echo '</select>';
    }
}

function updateFirstName($DB)
{
    $updateSQL_1 = "UPDATE tbl_Members SET FirstName = '" . $_POST['updateFirstName'] . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed successfully";
    }
}
function updateSurname($DB)
{
    $updateSQL_1 = "UPDATE tbl_Members SET Surname = '" . $_POST['updateSurname'] . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed successfully";
    }
}
function updateDOB($DB)
{
    $updateSQL_1 = "UPDATE tbl_Members SET DateOfBirth = '" . $_POST['updateDateOfBirth'] . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed successfully";
    }
}
function updateContactType($DB)
{
    if ($_SESSION['contactType'] = 1) {
        $contactType = "Email";
    }
    elseif ($_SESSION['contactType'] = 2) {
        $contactType = "TelNo";
    }
    else {
        die("Random Error");
    }
    $updateSQL_1 = "UPDATE tbl_MemberContact SET ContactType = '" . $contactType . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed successfully";
    }
}
function updateContactDetail($DB)
{
    $updateSQL_1 = "UPDATE tbl_MemberContact SET ContactDetail = '" . $_POST['updateContactDetail'] . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed successfully";
    }
}

function updateMemberType($DB)
{

    $updateSQL_1 = "UPDATE tbl_MemberType SET MemberType  = '" . $_SESSION['MemberType'] . "' WHERE MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $updateSQL_1)) {
        echo "Completed Successfully";
    }
    else {
        die(mysqli_error($DB));
    }
}

function updateFields($DB)
{
    if ($_POST['updateFirstName'] != $_SESSION['FirstName']) {
        updateFirstName($DB);
    }
    if ($_POST['updateSurname'] != $_SESSION['Surname']) {
        updateSurname($DB);
    }
    if ($_POST['updateDateOfBirth'] != $_SESSION['DateOfBirth']) {
        updateDOB($DB);
    }
    if ($_POST['updateContactType'] = 1 && $_POST['updateContactType'] != $_SESSION['ContactType'])
    {
        $contactType = "Email";
        $email = $_POST['updateContactDetail'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a correct email format";
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            updateContactType($DB);
            updateContactDetail($DB);
        }
    }
    if ($_POST['updateContactType'] = 2 && $_POST['updateContactType'] != $_SESSION['ContactType'])
    {
        $telno = $_POST['updateContactDetail'];
        if ($telno < 9 && $telno > 11)
        {
            echo "Please enter a telephone number at least 10 characters long.";
        }
        elseif ($telno >= 9 && $telno <= 11) {
            $telno = str_replace(array('(', ')', ' '), '', $telno);
            updateContactDetail($DB);
            updateContactType($DB);
        }


    }
    if ($_POST['updateMemberType'] != $_SESSION['MemberType'])
    {
        updateMemberType($DB);

    }
}

function deleteFields($DB)
{
    $deleteSQL1 = "DELETE FROM tbl_Members WHERE tbl_Members.MemberID = '" . $_SESSION['MemberID'] . "'";
    $deleteSQL2 = "DELETE FROM tbl_MemberContact WHERE tbl_MemberContact.MemberID = '" . $_SESSION['MemberID'] . "'";
    $deleteSQL3 = "DELETE FROM tbl_MemberType WHERE tbl_MemberType.MemberID = '" . $_SESSION['MemberID'] . "'";
    if (mysqli_query($DB, $deleteSQL1)) {
        if (mysqli_query($DB, $deleteSQL2)) {
            if (mysqli_query($DB, $deleteSQL3)) {
                echo "Deleted successfully";
            } else {
                echo mysqli_error($DB);
            }
        } else {
            echo mysqli_error($DB);
        }
    } else {
        echo mysqli_error($DB);
    }
}


function redirect($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}