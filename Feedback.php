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
session_start();
$username = $_SESSION['username'];
$name = $_SESSION['name'];

if(isset($_POST['submitbutton'])){
    if($_POST['submitbutton']){
        $cno = "";
        $cname = "";
        $tusername = "";
        $tname = "";
        $feedback = "";
        
        $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from course";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                   
                   if(isset($_POST[$row['cno']])){
                       $cno = $row['cno'];
                       $cname = $row['cname'];
                       $feedback = $_POST[$row['cno']];
                       break;
                   }
                    
                }
            }
            
            
            $sql2 = "select * from course_approve where cno='".$cno."';";
            $result2 = $conn->query($sql2);
            if($result->num_rows>0){
                $row2 = $result2->fetch_assoc();
                    $tusername = $row2['username'];
                    $tname = $row2['name'];
                }
                else
                    echo "No record on course_approve;";
        }
        }
     //All data got -> Time to insert
        
        $sql3 = "insert into feedback(username,name,cno,cname,tusername,tname,feedback) values('".
                $username."','".
                $name."','".
                $cno."','".
                $cname."','".
                $tusername."','".
                $tname."','".
                $feedback."');";
        if($conn->query($sql3)===TRUE){
            echo "Inserted";
        }
        else
        {
            echo "Error : ".$conn->error;
        }
    $conn->close();
    }


?>
<html>
    <head>
        <title>Feedback</title>
    </head>
    <body>
        <h1>Feedback:</h1>
        <?php 
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
                    if($row['approved']=="1"){
                    echo "<form action='' method='post'>";
                    echo "Course : ".$row['cname']."<br><br>";
                    echo "Feedback:<textarea rows='2' cols='30' name='".$row['cno']."'></textarea><br><br>";
                    echo "<input type='submit' name='submitbutton'>";
                    echo "</form>";
                    echo "<br><br><br>";
                    }
                    
                    
                    
                   
                    
                }
            }
            else{
                echo "<h2>Courses are not applied or not approved yet.</h2>";
            }
        }
   
    $conn->close();
        ?>
        
    </body>
</html>