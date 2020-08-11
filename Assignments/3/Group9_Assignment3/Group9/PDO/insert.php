<?php
session_start();

try{
$conn=new PDO("mysql:host=".$_SESSION["ser"].";dbname=".$_SESSION["dname"],"root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['action1'])){
	    
	    $nam= $_POST["name"];
	    $email= $_POST["email"];
	    $con= $_POST["con"];
	    $ad= $_POST["ad"];

	    $sqlin="INSERT INTO ".$_SESSION["tname"]."(name,email,contact,address) VALUES ('$nam','$email','$con','$ad')";
	    $conn->exec($sqlin)
	    or die(print_r($dbh->errorInfo(), true));
	    header("Location: http:///localhost/PDO/form2.html");
	    exit();
	}
	if(isset($_POST['action2'])){
	    $q = "SELECT * FROM ".$_SESSION["tname"];
	    $data=$conn->query($q);
	    echo "<table>";
                echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>name</th>";
                    echo "<th>email</th>";
                    echo "<th>contact</th>";
                    echo "<th>address</th>";
                echo "</tr>";
            while($row=$data->fetch()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
            }
        echo "</table>";
	} 
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>

