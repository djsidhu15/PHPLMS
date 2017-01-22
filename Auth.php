<?php
$server = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "phplms";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$usernamea = $_POST["username"];
//$passworda = $_POST["password"];
session_start();
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$appliedcourses = "";


 //Applied courses (Approved only)
        $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from apply where username ='".$username."';";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $i=1;
                while($row = $result->fetch_assoc()){
                    
                    $appliedcourses.=$i." ".$row["cno"]." ".$row["cname"];
                    if($row['approved']==1)
                        $appliedcourses.=" - Approved";
                    $appliedcourses.="<br>";
                    $i++;
                    
                }
            }
        }
   
    $conn->close();
 
?>
<html>
<head>Page 2</head>
<body>
    <h1>Welcome  <?php echo ''.$username; echo '<br>'.$name; ?> </h1>

Browse available courses : <a href="Allcourses2.php" > All courses </a>

<h2>My courses:</h2>
<p><?php echo $appliedcourses ?></p>
</body>
</html>
