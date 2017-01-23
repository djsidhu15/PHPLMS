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
if(isset($_POST['submitbutton'])){
    if($_POST['submitbutton']){
        var_dump($_POST);
        //Get course id and insert respective trainer into course_approve
        $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            
            
            
            
            
            $sql = "select * from course;";
            
            $result = $conn->query($sql);
            if($result->num_rows>0){
                
                while($row = $result->fetch_assoc()){
                    if($_POST[$row['id']]!="0"){
                    $tusername = $_POST[$row['id']];
                    
                    $tname = "";
                    $sql0 = "select * from trainer where tusername = '".$tusername."';";
                    $result0 = $conn->query($sql0);
                    if($result0->num_rows>0){
                        $row0 = $result0->fetch_assoc();
                           $tname = $row0['tname'];
                           echo $tname;
                    }
                    
                    
                    
                    
                    
                    
                    
                    $sql = "insert into course_approve(username,name,cno,cname) values('".
                    $tusername."','".
                    "$tname"."','".
                    $row['cno']."','".
                    $row['cname']."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
            }
            else{
                echo'Error2'.$conn->error;
            }
                }
                }
            }
        }
   // }
    $conn->close();
    }
}
?>
<html>
        <head>
            <title>
        Training Manager
        </title>
        </head>
        
        <body>
            <h1>Training Manager</h1>
            <h2>Approve trainers to the courses:</h2>
            <p><?php 
            
            $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            echo "<form action='' method='post'>";
            $sql = "select * from course";
            $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                while ($row= $result->fetch_assoc()){
                    
                    echo $row['cname']."         ";
                    
            $sql2 = "select * from trainer;";
            $result2 = $conn->query($sql2);
            if($result2->num_rows>0){
                $dropdown = "<select name = '".$row['id']."'>";
                $dropdown.="<option value='0'>---</option>";
                while($row2 = $result2->fetch_assoc()){
                    $dropdown.="<option value='".$row2['tusername']."'>".$row2['tname']."</option>";
                }
                $dropdown.="</select>";
            }
            echo $dropdown;
            echo "<br>";
                }//result while end
            }//result end
        }
   
    $conn->close();
            
            
            
                echo "<br>";
                echo "<input type='submit' value='Approve' name='submitbutton'";
                echo "</form>";
                    ?>
            </p>
            
        </body>
</html>

