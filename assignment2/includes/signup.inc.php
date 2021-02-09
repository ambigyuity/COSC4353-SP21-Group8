<?php

if (isset($_POST["submit"]))
{

    $username= $_POST["username"];
    $password= $_POST["psw"];
    $pwdRepeat= $_POST["psw-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(usernameCheck($conn, $username)!== false)
    {
        header("location: ../signuppage.php?error=usernameExists");
        exit();
    }

    if(pwdNotSame($password, $pwdRepeat)!== false)
    {
        header("location: ../signuppage.php?error=pwdMatchFalse");
        exit();
    }

    createUser($conn, $username, $password, $pwdRepeat);
    #createProfile($conn, $username, $password);


}
else{
    header("location: ../signuppage.php");
    exit();
}




?>