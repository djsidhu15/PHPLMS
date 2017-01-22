<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "phplms";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["courseinsert"])){
    if($_POST['courseinsert']){
        $cno = $_POST['cno'];
        $cname = $_POST['cname'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        
        $conn = new mysqli($server,$username,$password,$dbname);
        if($conn->connect_errno){
            die("Connection error ".$conn->connect_errno);
        }
        else{
            $sql = "insert into course(cno,cname,duration,description) values('".
                    $cno."','".
                    $cname."','".
                    $duration."','".
                    $description."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
            }
            else{
                echo'Error'.$conn->error;
            }
        }
    }
    $conn->close();
}

else if(isset($_POST["trainerinsert"])){
    if($_POST['trainerinsert']){
        $tno = $_POST['tno'];
        $tname = $_POST['tname'];
        $tusername = $_POST['tusername'];
        $tpassword = $_POST['tpassword'];
        
        $conn = new mysqli($server,$username,$password,$dbname);
        if($conn->connect_errno){
            die("Connection error ".$conn->connect_errno);
        }
        else{
            $sql = "insert into trainer(tno,tname,tusername,tpassword) values('".
                    $tno."','".
                    $tname."','".
                    $tusername."','".
                    $tpassword."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
            }
            else{
                echo'Error'.$conn->error;
            }
        }
    }
    $conn->close();
}

else if(isset($_POST["tminsert"])){
    if($_POST['tminsert']){
        $tmno = $_POST['tmno'];
        $tmname = $_POST['tmname'];
        $tmusername = $_POST['tmusername'];
        $tmpassword = $_POST['tmpassword'];
        
        $conn = new mysqli($server,$username,$password,$dbname);
        if($conn->connect_errno){
            die("Connection error ".$conn->connect_errno);
        }
        else{
            $sql = "insert into tm(no,name,username,password) values('".
                    $tmno."','".
                    $tmname."','".
                    $tmusername."','".
                    $tmpassword."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
            }
            else{
                echo'Error'.$conn->error;
            }
        }
    }
    $conn->close();
}

else if(isset($_POST["pminsert"])){
    if($_POST['pminsert']){
        $pmno = $_POST['pmno'];
        $pmname = $_POST['pmname'];
        $pmusername = $_POST['pmusername'];
        $pmpassword = $_POST['pmpassword'];
        
        $conn = new mysqli($server,$username,$password,$dbname);
        if($conn->connect_errno){
            die("Connection error ".$conn->connect_errno);
        }
        else{
            $sql = "insert into pm(no,name,username,password) values('".
                    $pmno."','".
                    $pmname."','".
                    $pmusername."','".
                    $pmpassword."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
            }
            else{
                echo'Error'.$conn->error;
            }
        }
    }
    $conn->close();
}

//if(isset($_POST["viewcourse"])){
 //   if($_POST['viewcourse']){
 { //List courses
        $conn= new mysqli($server,$username,$password,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from course;";
            $result = $conn->query($sql);
            $allcourses="";
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $allcourses.=$row["id"]." ".$row["cno"]." ".$row["cname"]." ".$row["duration"]." ".$row["description"]."<br>";
                }
            }
        }
   // }
    $conn->close();
//}
 }
 
 
  { //List trainers
        $conn= new mysqli($server,$username,$password,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from trainer;";
            $result = $conn->query($sql);
            $alltrainers="";
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $alltrainers.=$row["id"]." ".$row["tno"]." ".$row["tname"]." ".$row["tusername"]." ".$row["tpassword"]."<br>";
                }
            }
        }
   
    $conn->close();
 }
 
  { //List Traning Manager
        $conn= new mysqli($server,$username,$password,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from tm;";
            $result = $conn->query($sql);
            $alltm="";
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $alltm.=$row["id"]." ".$row["no"]." ".$row["name"]." ".$row["username"]." ".$row["password"]."<br>";
                }
            }
        }
   
    $conn->close();
 }
 
  { //List Project Manager
        $conn= new mysqli($server,$username,$password,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from pm;";
            $result = $conn->query($sql);
            $allpm="";
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $allpm.=$row["id"]." ".$row["no"]." ".$row["name"]." ".$row["username"]." ".$row["password"]."<br>";
                }
            }
        }
   
    $conn->close();
 }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Administrator</title>
    </head>
    <body>
        <b>Courses:</b>
        <p id="pviewcourse" style="display: block"><?php  echo $allcourses; ?></p>
        <h1>Add Courses</h1>
        <form action="" method="post" onsubmit="return insertcourse()">
        Course number : <input type="text" name="cno" id="cno" ><br><br>
        Course name : <input type="text" name="cname" id="cname"><br><br>
        Duration : <input type="text" name="duration" id="duration"><br><br>
        Description : <textarea name="description" id="description"></textarea><br><br>
        <input type="submit" value="Insert" name="courseinsert" id="courseinsert" onclick="insertcourse()">
        </form>
       <!-- <form action="" method="post">
        <input type="submit" value="View courses" name="viewcourse" id="viewcourse"><br><br>
        </form> !-->
       <br>
        
       
        <b>Trainers:</b>
        <p><?php  if($alltrainers=="") echo'Zero trainers'; else echo $alltrainers; ?></p>
        <h1>Add Trainers</h1>
        <form action="" method="post" onsubmit="return inserttrainer()">
        Trainer number : <input type="text" name="tno" id="tno" ><br><br>
        Trainer name : <input type="text" name="tname" id="tname"><br><br>
        Username : <input type="text" name="tusername" id="tusername"><br><br>
        Password : <input type="text" name="tpassword" id="tpassword"><br><br>
        <input type="submit" value="Insert" name="trainerinsert" id="trainerinsert" onclick="inserttrainer()">
        </form>
        
        <b>Training Manager:</b>
        <p><?php  if($alltm=="") echo'Zero TM'; else echo $alltm; ?></p>
        <h1>Add Training Manager</h1>
        <form action="" method="post" onsubmit="return inserttm()">
        Training Manager number : <input type="text" name="tmno" id="tmno" ><br><br>
        Training Manager name : <input type="text" name="tmname" id="tmname"><br><br>
        Username : <input type="text" name="tmusername" id="tmmusername"><br><br>
        Password : <input type="text" name="tmpassword" id="tmpassword"><br><br>
        <input type="submit" value="Insert" name="tminsert" id="tminsert" onclick="inserttm()">
        </form>
        
        <b>Project Manager:</b>
        <p><?php  if($allpm=="") echo'Zero PM'; else echo $allpm; ?></p>
        <h1>Add Project Manager</h1>
        <form action="" method="post" onsubmit="return insertpm()">
        Project Manager number : <input type="text" name="pmno" id="pmno" ><br><br>
        Project Manager name : <input type="text" name="pmname" id="pmname"><br><br>
        Username : <input type="text" name="pmusername" id="pmmusername"><br><br>
        Password : <input type="text" name="pmpassword" id="pmpassword"><br><br>
        <input type='submit' value='Insert' name='pminsert' id='pminsert' onclick='insertpm()'>
        </form>
        
        
        
        
        <script>
            function insertcourse(){
                var cno = ""; cno = document.getElementById("cno").value;
                var cname = ""; cname = document.getElementById("cname").value;
                var duration = ""; duration = document.getElementById("duration").value;
                var description = ""; description = document.getElementById("description").value;
                
                if(cno==""||cname==""||duration==""||description==""){
                    window.alert("Enter all the details");
                    return false;
                }
            }
            
            function displaycourse(){
                header("Refresh:0");
            }
            
            function inserttrainer(){
                var tno = ""; tno = document.getElementById("tno").value;
                var tname = ""; tname = document.getElementById("tname").value;
                var tusername = ""; tusername = document.getElementById("tusername").value;
                var tpassword = ""; tpassword = document.getElementById("tpassword").value;
                
                if(tno==""||tname==""||tusername==""||tpassword==""){
                    window.alert("Enter all the details");
                    return false;
                }
            }
            
            function inserttm(){
                var tmno = ""; tmno = document.getElementById("tmno").value;
                var tmname = ""; tmname = document.getElementById("tmname").value;
                var tmusername = ""; tmusername = document.getElementById("tmusername").value;
                var tmpassword = ""; tmpassword = document.getElementById("tmpassword").value;
                
                if(tmno==""||tmname==""||tmusername==""||tmpassword==""){
                    window.alert("Enter all the details");
                    return false;
                }
            }
            
            function insertpm(){
                var pmno = ""; pmno = document.getElementById("pmno").value;
                var pmname = ""; pmname = document.getElementById("pmname").value;
                var pmusername = ""; pmusername = document.getElementById("pmusername").value;
                var pmpassword = ""; pmpassword = document.getElementById("pmpassword").value;
                
                if(pmno==""||pmname==""||pmusername==""||pmpassword==""){
                    window.alert("Enter all the details");
                    return false;
                }
            }
            </script>
    </body>
</html>
