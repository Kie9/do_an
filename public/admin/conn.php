<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doan";


try
{
    $conn = new PDO("mysql: host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
    echo"connection failed: " . $ex->getMessage();
    die();
}
?>