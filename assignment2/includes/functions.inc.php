<?php

function usernameCheck($conn, $username)
{
    $sql= "SELECT * FROM users WHERE USERNAME = ?;";
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signuppage.php?error=stmtFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultsData= mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($resultsData))
    {   
        return $row;
    }
    else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function getAddress($conn, $USERID)
{
    $sql= "SELECT ADDRESS1 from profiles where USERID=?;";
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signuppage.php?error=stmtFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $USERID);
    mysqli_stmt_execute($stmt);

    $resultsData= mysqli_stmt_get_result($stmt);
    $address= mysqli_fetch_assoc($resultsData);
    $address1= $address['ADDRESS1'];
    return $address1;
}

function pwdNotSame($password, $pwdRepeat)
{
    $result= false;
    if($password !== $pwdRepeat)
    {
        $result= true;
    }

    return $result;  
}

function createUser($conn, $username, $password)
{
    $sql= "INSERT INTO users (USERNAME,PSW) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtFail");
        exit();
    }

    $encrypted= password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $encrypted);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    $usernameCheck= usernameCheck($conn, $username);
    $_SESSION['USERID'] =   $usernameCheck["USERID"];

    mysqli_query($conn, 'INSERT INTO profiles (USERID, FULLNAME,ADDRESS1,ADDRESS2, CITY,ST,ZIP) VALUES (' . $_SESSION['USERID'] . '," ", " ", " ", " ", " ", " ");');

    header("location: ../index.php?error=noErrorSignUpSuccessful");
    exit();   

}   

function loginUser($conn, $username, $password)
{
    $usernameCheck= usernameCheck($conn, $username);
    session_start();
    $_SESSION['USERID'] =   $usernameCheck["USERID"];
    $_SESSION['USERNAME'] =   $usernameCheck["USERNAME"];
    header("location: ../index.php?LoginSuccessful");
    exit();
}

function incorrectLogin($conn, $username, $password)
{
      
    $usernameCheck= usernameCheck($conn, $username);
    if($usernameCheck=== false)
    {
        header("location: ../loginpage.php?error=usernameDNE");
        exit();
    }

    $encrypted = $usernameCheck['PSW'];
    $pswMatch= password_verify($password, $encrypted);

    if($pswMatch===false)
    {
        header("location: ../loginpage.php?error=WrongPassword");
        exit();
    }
    else
    {
        loginUser($conn, $username,$password);
    }
}


function updateInformation($conn, $USERID, $fullname, $address, $altaddress, $city, $state, $zip)
{
    $sql= 'UPDATE profiles set FULLNAME=?,ADDRESS1= ?, ADDRESS2= ? ,CITY= ?, ST= ?,ZIP=? WHERE USERID= ?;';
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssii", $fullname, $address, $altaddress, $city, $state, $zip, $USERID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../profile.php?UpdateSuccessful");
    exit();
}

function insertQuote($conn, $USERID,$gallons, $dAddress, $dDate, $sPrice, $tPrice)
{
    $sql= 'INSERT INTO quotes (USERID, GALLONS, ADDRESS1, SCHEDDATE, SUGGESTED, TOTAL) VALUES (?,?,?,?,?,?);';
    $stmt= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iissdd", $USERID,$gallons, $dAddress, $dDate, $sPrice, $tPrice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?quoteFilled");
    exit();
}

?>