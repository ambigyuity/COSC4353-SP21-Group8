<?php

if (isset($_POST["LIsubmit"]))
{
    $username=$_POST["uname"];
    $password=$_POST["psw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    incorrectLogin($conn, $username, $password);



}
else{
    header("location: ../loginpage.php");
    exit();
}




?>