<?php
include_once "dbconn.php";
if (isset($_GET["email"])) {
    $email = $_GET["email"];
}
else {
    echo('Invalid Parameters');
    die;
}
$sql="UPDATE `users` SET U_ACTIVATED = 1 WHERE U_EMAIL= '$email' ";

$tbl_q = mysqli_query($link, $sql);
header("location: index.php?t=Your account has been activated.");