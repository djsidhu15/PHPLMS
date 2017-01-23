<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
var_dump($_POST);
if(isset($_POST["SubmitButton"]))
if($_POST["SubmitButton"]){
    
    $usernametext = $_POST["username"];
    $passwordtext = $_POST["password"];
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "phplms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
$sql = "SELECT * from register;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if($usernametext==$row["username"]){
            if($passwordtext==$row["password"]){
                session_start();
                
                $_SESSION['username']=$usernametext;
                $_SESSION['name']=$row["name"];
                header('Location: Auth.php');
                $conn->close();
                exit;
            }
        }
    }
} else {
    echo "0 results";
    $conn->close();
}
}

//Check Trainer
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
$sql = "SELECT * from trainer;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if($usernametext==$row["tusername"]){
            if($passwordtext==$row["tpassword"]){
                session_start();
                
                $_SESSION['username']=$usernametext;
                $_SESSION['name']=$row["name"];
                header('Location: Trainer.php');
                $conn->close();
                exit;
            }
        }
    }
} else {
    echo "0 results";
    $conn->close();
}
}

//Check Training Manager
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
$sql = "SELECT * from tm;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if($usernametext==$row["username"]){
            if($passwordtext==$row["password"]){
                session_start();
                
                $_SESSION['username']=$usernametext;
                $_SESSION['name']=$row["name"];
                header('Location: TrainingManager.php');
                $conn->close();
                exit;
            }
        }
    }
} else {
    echo "0 results";
    $conn->close();
}
}

//Check Project Manager
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
$sql = "SELECT * from pm;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if($usernametext==$row["username"]){
            if($passwordtext==$row["password"]){
                session_start();
                
                $_SESSION['username']=$usernametext;
                $_SESSION['name']=$row["name"];
                header('Location: ProjectManager.php');
                $conn->close();
                exit;
            }
        }
    }
} else {
    echo "0 results";
    $conn->close();
}
}




}//Submitbutton end




?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h1><div style="text-align: center">LMS - Learning Management System</div></h1>

<br><br><br><br><br>
<div style="text-align: center;color: blueviolet">

<form action='' method='post'>
    Username : <input type="text" name="username" autofocus=""><br><br><br>
    Password : <input type="password" name="password"><br><br><br>
    <input type='submit' name="SubmitButton" value="Login">
</form>
</div>
    <br>
    <center>
    New to LMS? Register <a href="Register.php">here</a>.
    </center>

    </body>
</html>
<?php 

?>