<?php
session_start();
session_destroy();
$text = "";
if (isset($_GET["t"])) {
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
<form method="post" action="login.php" align="center" class="login_form">
    <p class="login_header"><b>AISMARKET</b></p>
    <table align="center">
        <tr>
            <td height="20px"><b>Email</b></td>
        </tr>
        <tr>
            <td><input type="email" name="user" value=""/></td>
        </tr>
        <tr>
            <td height="20px">
            </td>
        </tr>
        <tr>
            <td height="20px"><b>Password</b></td>
        </tr>
        <tr>
            <td><input type="password" name="pass" value=""/></td>
        </tr>
        <tr>
            <td height="25px">
            </td>
        </tr>
        <tr style="height:50px">
            <td>
                <input type="submit" value=" Login " class="login_btn effect"/>
                <a href="signup_form.php " class="signup_btn effect">
                        Sign Up
                    </a>
            </td>
        </tr>
    </table>
    <span style="color: #CF6679">
        <?= $text ?>
    </span>
</form>
</body>
</html>