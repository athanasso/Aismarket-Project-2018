<?php
include_once "dbconn.php";


function activationEmail($email)
{
//    $activation_link = "http://localhost/aismarket/verify.php?email={$email}";
//    $msg = "
//        Click the link to activate your account <br>
//        {$activation_link}";
//
//    $headers = "From: test@gmail.com";

    echo("
                        <head>
                            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
                                <title> Activation </title>
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />
                        </head>
                        <body style=\"text-align: center\" class='login_error' >
                            <strong> The last step of your sign-up is to <a href='http://localhost/aismarket/verify.php?email={$email}' class='popup'>activate</a> your account in order to access the site.</strong> <br>
                        </body>");
                        die;
}

$table = "users";
$user = $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$cols = "U_FULLNAME, U_EMAIL, U_PASSWD, U_ACTIVATED";
if (!$user && !$email && !$pass){
    header("location: signup_form.php?t=Error: All fields empty!");
    die;
}
else if (!$user && !$email) {
    header("location: signup_form.php?t=Error: Username and Email empty!");
    die;
}
else if (!$user && !$pass) {
    header("location: signup_form.php?t=Error: Username and Password empty!");
    die;
}
else if (!$email && !$pass) {
    header("location: signup_form.php?t=Error: Email and Password empty!");
    die;
}
else if (!$user) {
    header("location: signup_form.php?t=Error: Username Required!");
    die;
}
else if (!$email) {
    header("location: signup_form.php?t=Error: Email Required!");
    die;
}
else if (!$pass) {
    header("location: signup_form.php?t=Error: Password Required!");
    die;
}

$values = "'" . $user . "', '" . $email . "', '" . $pass . "', 0";
$sql = "INSERT INTO $table($cols) VALUES ($values);";
$tbl_q = mysqli_query($link, $sql);
activationEmail($email);
header("location: index.php?t= Account has been created, please confirm your email");

?>
