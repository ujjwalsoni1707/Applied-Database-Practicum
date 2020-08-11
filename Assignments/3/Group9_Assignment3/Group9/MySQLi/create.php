<?php
session_start();

$_SESSION["dname"]= $_POST["database"];
$_SESSION["tname"]=$_POST["table"];


$link = mysqli_connect("localhost", "root", "");

$sql1 = "CREATE DATABASE ".$_SESSION["dname"];
$sql2 = "USE ".$_SESSION["dname"];
echo mysqli_query($link,$sql1);
echo mysqli_query($link,$sql2);

$sql3="CREATE TABLE ".$_SESSION["tname"]."(
id int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(30) NOT NULL,
email varchar(50),
contact int(11),
address varchar(200)
)";

echo mysqli_query($link,$sql3);
mysqli_close($link);
header("Location: http:///localhost/MySQLi/form2.html");

?>