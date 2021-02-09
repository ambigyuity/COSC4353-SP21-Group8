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
        $USERID= $_SESSION['USERID'];
    }
    else
    {
        $fullname="fname";
        $address="address1";
        $altaddress="address2";
        $city="city";
        $state="state";
        $zip= 44123;
        $USERID=10;
    }
    $test='UPDATE profiles set FULLNAME="'.$fullname.'",ADDRESS1="'.$address.'",ADDRESS2="'.$altaddress.'",CITY="'.$city.'",ST="'.$state.'",ZIP='.$zip.' WHERE USERID='.$USERID.';';
    echo '<p>' .$test. '</p>';


?>
