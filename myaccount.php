<?php
session_start();
$text = "";
if (isset($_GET['t'])){
    $text = $_GET['t'];
}


if (!isset($_SESSION['uname'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<form method="post" action="myaccount_change.php" align="center" class="account_form">
    <p class="login_header"><b>Logged in user: <span style="color: #03DAC6"><?= $_SESSION['uname'];?></span></b></p>
    <table align="center">
        <tr>
            <td height="20px"><b>Current Email: <span style="color: #03DAC6"><?= $_SESSION['email']; ?></span></b></td>
        </tr>
        <tr>
            <td height="5px">
            </td>
        </tr>
        <tr>
            <td>New Email:</td>
        </tr>
        <tr>
            <td height="5px">
            </td>
        </tr>
        <tr>
            <td><input type="email" name="email" value=""/></td>
        </tr>
        <tr>
            <td height="40px">
            </td>
        </tr>
        <tr>
            <td height="20px"><b>Current Password: <span style="color: #03DAC6"><?= $_SESSION['password']; ?></span></b></td>
        </tr>
        <tr>
            <td height="5px">
            </td>
        </tr>
        <tr>
            <td>New Password:</td>
        </tr>
        <tr>
            <td height="5px">
            </td>
        </tr>
        <tr>
            <td><input type="text" name="pass" value=""/></td>
        </tr>
        <tr>
            <td height="25px">
            </td>
        </tr>
        <tr style="height:50px">
            <td>
                <input class="login_btn effect" style="width: 150px" type="submit" value="Save changes">
            </td>
        </tr>
        <tr style="color: #CF6679; height:50px">
            <td>
                <span><?= $text ?></span>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
