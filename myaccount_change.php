<?php
session_start();
include_once "dbconn.php";

if(!isset( $_SESSION['uname'])){
    header("location: index.php");
    die;
}
if (!isset($_POST['email']) || !isset($_POST['pass'])){
    echo 'Invalid Parameters';
    die;
}

$email = $_POST['email'];
$pass = $_POST['pass'];
$user = $_SESSION['uname'];

if($email && $pass) {
    $sql = "
    UPDATE `users`
    SET U_EMAIL = '$email',
        U_PASSWD = '$pass'     
    WHERE U_FULLNAME = '$user'";
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $pass;
}
else if(!$email && $pass) {
    $sql = "
    UPDATE `users`
    SET U_PASSWD = '$pass'     
    WHERE U_FULLNAME = '$user'";
    $_SESSION['password'] = $pass;
}
else if(!$pass && $email) {
    $sql = "
    UPDATE `users`
    SET U_EMAIL = '$email'
    WHERE U_FULLNAME = '$user'";
    $_SESSION['email'] = $email;
}
else if(!$pass && !$email){
    header("location: myaccount.php?t=Nothing new given.");
    die;
}

$tbl_q = mysqli_query($link, $sql);
header("location: myaccount.php?t=Your changes have been saved.");