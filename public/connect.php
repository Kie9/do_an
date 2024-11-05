<?php

$connect = mysqli_connect('localhost','root','','doan');
mysqli_set_charset($connect,'utf8');

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "doan";


// try
// {
//     $connect = new PDO("mysql: host=$servername;dbname=$dbname", $username, $password);
//     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// }
// catch(PDOException $ex)
// {
//     echo"connection failed: " . $ex->getMessage();
//     die();
// }

