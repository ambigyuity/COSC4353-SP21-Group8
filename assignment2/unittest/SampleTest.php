<?php
require _DIR_ . "/../App/Models/User.php"; 

class SampleTest extends \PHPUnit_Framework_TestCase
{
    public function testUsernameCheckDNE()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
        
        $testUser= new \App\Models\functions;
        $results= $testUser->usernameCheck($conn,'nseremo');

        $this->assertEquals($results, false);
    }

    public function testUsernameCheckExist()
    {

        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
        
        $testUser= new \App\Models\functions;
        $results= $testUser->usernameCheck($conn,'UserDemo');
        $username= $results['USERNAME'];
        $this->assertEquals($username, 'UserDemo');
    }

    public function testgetAddress()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
        
        $testUser= new \App\Models\functions;
        $results= $testUser->getAddress($conn,3);
        $this->assertEquals($results, '3126');
    }

    public function testInsertQuote()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

        $testUser= new \App\Models\functions;
        $results= $testUser->pwdNotSame('testPassword', 'NotSamePassword');
        $this->assertTrue($results);
    }

    public function testShowPrices()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

        $testUser= new \App\Models\functions;
        $results= $testUser->showPrices($conn,5,1500,'3126 colony crossings drive', '2005-03-30',0,0);
        $this->assertEquals($results, 2542.5);
    }

    public function testPasswordNotSame()
    {
        $testUser= new \App\Models\functions;
        $results= $testUser->pwdNotSame('testPassword', 'NotSamePassword');
        $this->assertTrue($results);
    }

    public function testPaswordSame()
    {
        $testUser= new \App\Models\functions;
        $results = $testUser->pwdNotSame('SamePassword', 'SamePassword');
        $this->assertFalse($results);
    }

    public function testLoginUser()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
        

        $testUser= new \App\Models\functions;
        $results= $testUser->loginUser($conn, 'BryanAccount','Password');
    }

    public function testIncorrectLogin()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

        $testUser= new \App\Models\functions;
        $results= $testUser->incorrectLogin($conn, 'BryanAccount','Password');
        $this->assertTrue($results);
    }

    public function testUpdateInformation()
    {
        $serverName= "localhost";
        $dbUsername= "root";
        $dbPassword= "";
        $dbName= "4353softdes";
        $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

        $testUser= new \App\Models\functions;
        $results= $testUser->updateInformation($conn, 3, 'Jiacheng Yu','3126', 'colony crossings', 'Sugar Land', 'TX', 77479);
    }
}