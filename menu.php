<?php
session_start();
if (!isset($_SESSION['valid']) || ($_SESSION['valid'] != '1')) {
    header('location: index.php');
    exit();
}

$action = isset($_GET['action']) ? ($_GET['action']) : "";
$pid = isset($_GET['pid']) ? ($_GET['pid']) : "";
$spcf_pg = isset($_GET['pg']) ? intval($_GET['pg']) : 1;

if ($action == 'added') {
    echo '<script type="text/javascript">';
    echo "alert('Το προϊόν με κωδικό: " . $pid . "\\n προστέθηκε στο καλάθι σας.');";
    echo '</script>';
}
if ($action == 'exists') {
    echo '<script type="text/javascript">';
    echo "alert('Το προϊόν με κωδικό: " . $pid . "\\n υπάρχει ήδη στο καλάθι σας.');";
    echo '</script>';
}

include_once "dbconn.php";
$table = "PRODUCTS";
$cols = "*";
$sel = "SELECT $cols FROM $table ORDER BY P_DESCR";
$tbl_q = mysqli_query($link, $sel);
$r2pg = 3;


$all_recs = mysqli_num_rows($tbl_q);
$pg_num = (int)($all_recs / $r2pg);
$lstpg = $all_recs - ($pg_num * $r2pg);
if ($pg_num * $r2pg < $all_recs) {
    $pg_num = $pg_num + 1;
}
$firsti = ($spcf_pg * $r2pg) - $r2pg;
if ($spcf_pg == $pg_num) {
    $lasti = $all_recs;
} else {
    $lasti = $spcf_pg * $r2pg;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>AISMARKET: Κεντρική Σελίδα</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<table id="bara">
    <tr>
        <td width="28%">Connected User: <strong style="color: #03DAC6"><?= $_SESSION['uname']; ?></strong></td>
        <td width="42%"><a href="myaccount.php" class="myaccount_btn effect">View/Edit Account</a></td>
        <td width="15%">Cart: <a href="basket.php"><img src="./images/basket.gif"
                                                                 style="width:20px; height:20px"/></a></td>
        <td width="15%">Logout: <a href="logout.php"><img src="./images/logout.png"
                                                              style="width:20px; height:20px"/></a></td>
    </tr>
</table>
<br>
<br>
<table id="lista" align="center">
    <thead>
    <tr>
        <td width="8%">ID</td>
        <td width="36%">DESCRIPTION</td>
        <td width="12%">CATEGORY</td>
        <td width="5%">PHOTO</td>
        <td width="12%">PRICE</br><font size="1"> (23% VAT included)</font></td>
        <td width="7%">WEIGHT</td>
        <td width="6%">IN STOCK</td>
        <td width="6%">ADD TO CART</td>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = $firsti; $i <= ($lasti - 1); $i++) {
        if (mysqli_data_seek($tbl_q, $i)) {
            $tbl_row = mysqli_fetch_row($tbl_q);
        }
        if ($tbl_row[7] > 0) {
            $tabela = "NAI";
            $agora = "<a href='bskt_add.php?pid=" . $tbl_row[0] . "&pg=" . $spcf_pg . "'><img src='./images/basket.gif' style='width:50px; height:50px' /></a>";
        } else {
            $tabela = "OXI";
            $agora = "<img src='./images/basket.gif' style='width:50px; height:50px;-webkit-filter:grayscale(100%);-moz-filter:grayscale(100%);filter:grayscale(100%);' />";
        }
        ?>

        <tr>
            <td><?= $tbl_row[0] ?></td>
            <td><?= $tbl_row[1] ?></td>
            <td><?= $tbl_row[2] ?></td>
            <td><img src="<?= $tbl_row[3] ?>" style="width:50px; height:50px"/></td>
            <td style="text-align:right"><?= number_format($tbl_row[4] + $tbl_row[5], 2, ',', '') ?> €</td>
            <td style="text-align:right"><?= number_format($tbl_row[6], 3, ',', '') ?> kgr</td>
            <td><? echo $tabela; ?></td>
            <td><? echo $agora; ?></td>
        </tr>
        <?php
    }
    mysqli_free_result($tbl_q);
    mysqli_close($link);
    ?>
    </tbody>
</table>
<table align="center" class="pages">
    <tr>
        <?php
        for ($i = 0; $i < $pg_num; $i++) { ?>
            <td><a class="page_number effect" href="menu.php?pg=<?= ($i + 1) ?>"><?= ($i + 1) ?></a></td>
            <?php
        }
        ?>
    </tr>
</table>
</body>
</html>
