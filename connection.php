<?php
// define("HOSTNAME" , "localhost");
// define("USERNAME" , "root");
// define("PASSWORD" , "");
// define("DBNAME" , "data");

// $dbconnection=mysqli_connect("HOSTNAME","USERNAME","PASSWORD","DBNAME");
// if(!$dbconnection){
//     die("<br>connection failed<br>" . mysqli_connect_error());
// }

$hostname="localhost";
$username="root";
$password="";
$dbname="sign_up";

$dbconnection=mysqli_connect($hostname,$username,$password,$dbname);

if(!$dbconnection){
    die("connection failed" . mysqli_connect_error($connection));
}

?>
