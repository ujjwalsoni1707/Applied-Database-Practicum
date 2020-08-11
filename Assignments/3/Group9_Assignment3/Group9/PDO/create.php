<?php
session_start();

$_SESSION["dname"]= $_POST["database"];
$_SESSION["tname"]=$_POST["table"];
$_SESSION["ser"]="localhost";

try{
$conn=new PDO("mysql:host=".$_SESSION["ser"],"root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("CREATE DATABASE ".$_SESSION["dname"].";");
$conn=NULL;

$conn=new PDO("mysql:host=".$_SESSION["ser"].";dbname=".$_SESSION["dname"],"root","");
$conn->exec("USE ".$_SESSION["dname"]);

$sql="CREATE TABLE ".$_SESSION["tname"]."(
id int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(30) NOT NULL,
email varchar(50),
contact int(11),
address varchar(200)
)";

$conn->exec($sql);

}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
header("Location: http:///localhost/PDO/form2.html");

?>