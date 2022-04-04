<?php
include_once "dbconn.php";
$table = "USERS";
$user = $_POST['user'];
$pass = $_POST['pass'];
$goto_url = "";

if (!$pass) {
    header('location: message.html');
    die;
}

$cols = "U_EMAIL,U_PASSWD,U_FULLNAME,U_ACTIVATED";
$sel = "SELECT $cols FROM $table WHERE U_EMAIL='$user'";
$tbl_q = mysqli_query($link, $sel);

$tbl_row = mysqli_fetch_array($tbl_q, MYSQLI_ASSOC);

if ($user == $tbl_row["U_EMAIL"] && ($pass == $tbl_row["U_PASSWD"]) && ($tbl_row['U_ACTIVATED'] == 1)) {
    session_start();
    $_SESSION['valid'] = '1';
    $_SESSION['uname'] = $tbl_row['U_FULLNAME'];
    $_SESSION['email'] = $tbl_row['U_EMAIL'];
    $_SESSION['password'] = $tbl_row['U_PASSWD'];
    $goto_url = "menu.php";
    header('location: ' . $goto_url);
    die;
} else if ($user != $tbl_row["U_EMAIL"] || ($pass != $tbl_row["U_PASSWD"])) {
    $goto_url = "message.html";
    header('location: ' . $goto_url);
    die;
} else if ($user == $tbl_row["U_EMAIL"] && ($pass == $tbl_row["U_PASSWD"]) && $tbl_row['U_ACTIVATED'] == 0) {
    $goto_url = "index.php?t=Your account is not activated.";
    header('location: ' . $goto_url);
    die;
}

header('location: message.html');

?>
