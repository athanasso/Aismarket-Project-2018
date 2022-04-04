<?php
session_start();
session_destroy();
$text = "";
if (isset($_GET["t"])){
    $text = $_GET["t"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login Aismarket</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<form method="post" action="signup.php" align="center" class="signup_form">
    <p class="login_header"><b>Signup</b></p>
    <table align="center">
        <tr>
            <td height="30px"><b>Username</b></td>
        </tr>
        <tr>
            <td><input type="text" name="user" value=""/></td>
        </tr>
        <tr>
            <td height="20px">
            </td>
        </tr>
        <tr>
            <td height="20px"><b>Email</b></td>
        </tr>
        <tr>
            <td><input type="email" name="email" value=""/></td>
        </tr>
        <tr>
            <td height="20px">
            </td>
        </tr>
        <tr>
            <td height="30px"><b>Password</b></td>
        </tr>
        <tr>
            <td><input type="password" name="pass" value=""/></td>
        </tr>
        <tr>
            <td height="20px">
            </td>
        </tr>
        <tr style="height:40px">
            <td>
                <input type="submit" value="Sign Up" style="width:45%" class="login_btn effect"/>
            </td>
        </tr>
        <tr>
            <td height="5px">
            </td>
        </tr>
    </table>
    <span style="color: #CF6679">
        <?= $text?>
    </span>
</form>
</body>
</html>