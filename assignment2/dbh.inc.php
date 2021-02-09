<?php

$serverName= "localhost";
$dbUsername= "root";
$dbPassword= "";
$dbName= "4353softdes";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
    echo "Connection failed";
    die("Database connection failed: " . mysqsli_connect_error());
}

?>