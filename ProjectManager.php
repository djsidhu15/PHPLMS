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
//Get apply table - generate checkboxes for approval - PM
var_dump($_POST);
var_dump($_GET);

if(isset($_POST['submitbutton'])){
    if(isset($_POST['check'])){
    $checkboxes = $_POST['check'];
    $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            for($i=0;$i<sizeof($checkboxes);$i++){
            $sql = "update apply set approved ='1' where id =".$checkboxes[$i].";";
            if($conn->query($sql)===TRUE){
                //echo 'Inserted';
            }
            else{
                echo "Error".$conn->error;
            }
            }
            

            
        }
   
    $conn->close();
}
}
 
?>
<html>
        <head>
            <title>
        Project Manager
        </title>
        </head>
        
        <body>
            <h1>Project Manager</h1>
            <h2>Approve courses:</h2>
            <p><?php 
            
            $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
            $checkboxesdata="";
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from apply;";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                echo "<form action='' method='post'>";
                $i=1;
                while($row = $result->fetch_assoc()){
                    if($row['approved']==1)
                        $checkboxesdata.=$i." <input type='checkbox' checked='true' name='check[]' value ='".$row['id']."'>".$row["name"]." - ".$row["cname"]."<br>";
                    else
                    $checkboxesdata.=$i." <input type='checkbox' name='check[]' value ='".$row['id']."'>".$row["name"]." - ".$row["cname"]."<br>";
                    $i++;
                }
            }
        }
   
    $conn->close();
            
            
            
            echo $checkboxesdata; 
                    
                echo "<input type='submit' value='Approve' name='submitbutton'";
                echo "</form>";
                    ?>
            </p>
            
        </body>
</html>