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
$cno="";
$cname = "";

if(isset($_GET['id'])){
    if($_GET['id']){
        $cno = $_GET['id'];
        $cname = getcname($cno);
        apply($username,$name,$cno,$cname);
    }
}
echo $cno.$cname.$username.$name;

function getcname($id){
    $server = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "phplms";
     { //Get course name
        $conn= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->errno){
            die("Connection Error ".$conn->errno);
        }
        else{
            $sql = "select * from course where cno = ".$id.";";
            $result = $conn->query($sql);
            $allcourses="";
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $cname = $row['cname'];    
            }
        }
   // }
    $conn->close();
    return $cname;
//}
   
 }
}
    
    function apply($username,$name,$cno,$cname){
     $server = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "phplms";
    $conn = new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn->connect_errno){
            die("Connection error ".$conn->connect_errno);
        }
        else{
            $sql = "insert into apply(username,name,cno,cname) values('".
                    $username."','".
                    $name."','".
                    $cno."','".
                    $cname."');";
            if($conn->query($sql)===TRUE){
                echo'Inserted';
                echo "<script>window.alert('Successfully applied for ".$cname."');</script>";
            }
            else{
                echo'Error'.$conn->error;
            }
            $conn->close();
        }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>All courses</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>All courses</h1>
  </div>

  <div data-role="main" class="ui-content">
    <h2>Courses</h2>
    <?php 
    { //List courses
        $conn2= new mysqli($server,$dbusername,$dbpassword,$dbname);
        if($conn2->errno){
            die("Connection Error ".$conn2->errno);
        }
        else{
            $sql = "select * from course;";
            $result = $conn2->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $cno = $row["cno"];
                    $cname = $row["cname"];
                    $duration = $row["duration"];
                    $description = $row["description"];
                    echo "<div data-role='collapsible'>";
                    echo "<h4>".$cname."</h4>";
                    echo "<p>".$duration."</p>";
                    echo "<p>".$description."</p>";
                    echo "<form action='' method='get'>";
                    echo "<input type='button' value='Apply' style='background-color: blue' id='".$cno."' name='".$cno."' onclick='clickfn(".$cno.")'>";
                    echo "</form>";
                    echo "</div>";
                }
                
            }
        }
   
    $conn2->close();
 }
    ?>
    
  </div>

  <!--<div data-role="footer">
    <h1>Footer</h1>
  </div>
</div> !-->
  <script>
      function clickfn(id){
          var link = "http://localhost/PHPLMS/Allcourses2.php?id="+id;
          window.location = link;
      }
      </script>

</body>
</html>