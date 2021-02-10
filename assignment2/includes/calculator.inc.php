<?php
session_start();
if (isset($_POST["calcSubmit"]))
{
    $gallons=$_POST["gallons"];
    $dAddress=$_POST["dAddress"];
    $dDate=$_POST["deliverydate"];
    $sPrice=$_POST["suggestedprice"];
    $tPrice=$_POST["TAmtPrice"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    insertQuote($conn,$_SESSION['USERID'],$gallons, $dAddress, $dDate, $sPrice, $tPrice);
}
else{
    header("location: ../profile.php?Error=somethingwentwrong");
    exit();
}


?>
