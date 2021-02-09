<?php
session_start();
if (isset($_POST["profilesubmit"]))
{
    $fullname=$_POST["fname"];
    $address=$_POST["address1"];
    $altaddress=$_POST["address2"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $zip=$_POST["zip"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    
    updateInformation($conn, $_SESSION['USERID'], $fullname, $address, $altaddress, $city, $state, $zip);
}
else{
    header("location: ../profile.php?Error=somethingwentwrong");
    exit();
}


?>
