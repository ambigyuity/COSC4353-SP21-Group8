<?php

namespace App\Models;

class functions
{
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

    function showPrices($conn, $USERID,$gallons, $dAddress, $dDate, $sPrice, $tPrice)
    {
        $sql= "SELECT ST from profiles where USERID=?;";
        $stmt= mysqli_stmt_init($conn);
        $currentPrice= 1.50;
        $locationFactor=0;
        $gallonsRequestedFactor=0;
        $rateHistoryFactor=0;
        $companyProfitFactor=.1;

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../signuppage.php?error=stmtFail");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $USERID);
        mysqli_stmt_execute($stmt);

        $resultsData= mysqli_stmt_get_result($stmt);
        $state= mysqli_fetch_assoc($resultsData);
        $state1= $state['ST'];

        //Location Factor
        if($state1=='TX')
        {
            $locationFactor=.02;
        }
        else
        {
            $locationFactor=.04;
        }

        //rateHistoryFactor
        $sql= "SELECT * from quotes where USERID=?;";
        $stmt= mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../signuppage.php?error=stmtFail");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $USERID);
        mysqli_stmt_execute($stmt);

        $resultsData= mysqli_stmt_get_result($stmt);
        $counter= mysqli_num_rows($resultsData);
        
        if($counter>0)
        {
            $rateHistoryFactor=.01;
        }
        else
        {
            $rateHistoryFactor=0;
        }

        //Gallons Requested Factor
        if($gallons>1000)
        {
            $gallonsRequestedFactor=.02;
        }
        else
        {
            $gallonsRequestedFactor=.03;
        }

        $Margin=$currentPrice*($locationFactor-$rateHistoryFactor+$gallonsRequestedFactor+$companyProfitFactor);
        $suggestedPrice= $currentPrice+$Margin;
        $totalPrice= $gallons*$suggestedPrice;

        $_SESSION['gallons']= $gallons;
        $_SESSION['dDate']=$dDate;
        $_SESSION['suggestedPrice'] =   $suggestedPrice;
        $_SESSION['totalPrice'] =   $totalPrice;

        return  $totalPrice;
        header("location: ../calculator.php");
        exit();
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

        return true;
        header("location: ../index.php?error=noErrorSignUpSuccessful");
        exit();   

    }   

    function loginUser($conn, $username, $password)
    {
        $usernameCheck= $this->usernameCheck($conn, $username);
        session_start();
        $_SESSION['USERID'] =   $usernameCheck["USERID"];
        $_SESSION['USERNAME'] =   $usernameCheck["USERNAME"];
        header("location: ../index.php?LoginSuccessful");
        exit();
    }

    function incorrectLogin($conn, $username, $password)
    {
        
        $usernameCheck= $this->usernameCheck($conn, $username);
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
            $this->loginUser($conn, $username,$password);
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
        $_SESSION['UPDATED']=TRUE;
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

}