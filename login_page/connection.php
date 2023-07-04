<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="sign_up";

$dbconnection=mysqli_connect($hostname,$username,$password,$dbname);

if(!$dbconnection){
    die("connection failed" . mysqli_connect_error($connection));
}


?>
