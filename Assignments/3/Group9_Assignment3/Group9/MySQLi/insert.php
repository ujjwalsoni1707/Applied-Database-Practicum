<?php
session_start();

$link = mysqli_connect("localhost", "root", "");
mysqli_query($link,"USE ". $_SESSION["dname"]);
if(isset($_POST['action2'])){
    $sql = "SELECT * FROM ".$_SESSION["tname"];
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>name</th>";
                    echo "<th>email</th>";
                    echo "<th>contact</th>";
                    echo "<th>address</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } 
    else{
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($link);
    }
}
if(isset($_POST['action1'])){
    
    $nam= $_POST["name"];
    $email= $_POST["email"];
    $con= $_POST["con"];
    $ad= $_POST["ad"];

    $sql4="INSERT INTO ".$_SESSION["tname"]."(name,email,contact,address) VALUES ('$nam','$email','$con','$ad')";
    if(mysqli_query($link, $sql4)){
        echo "Value added.";
    } else{
        echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link);
    }
    header("Location: http:///localhost/MySQLi/form2.html");
    exit();
}

mysqli_close($link);
?>

