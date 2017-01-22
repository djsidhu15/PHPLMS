<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "phplms";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['registerbutton']))
{
    if($_POST['registerbutton']){
        if(isset($_POST['name'])&&isset($_POST['dob'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['mobile'])){
            if($_POST['name']!=NULL&&$_POST['dob']!=NULL&&$_POST['username']!=NULL&&$_POST['password']!=NULL&&$_POST['mobile']!=NULL)
            {
            $nametext = $_POST['name'];
            $dobtext = $_POST['dob'];
            $usernametext = $_POST['username'];
            $passwordtext = $_POST['password'];
            $mobiletext = $_POST['mobile'];
            
            $conn = new mysqli($servername,$username,$password,$dbname);
            if($conn->connect_errno){
                die("Connection error ".$conn->connect_errno);
            }
            
            else{
                
                $sql = "insert into register(name,dob,username,password,mobile) values ('".
                        $nametext."','".
                        $dobtext."','".
                        $usernametext."','".
                        $passwordtext."','".
                        $mobiletext."');";
                
                if($conn->query($sql)===TRUE){
                    echo 'Successfully registered!';
                    $sql2="insert into login(username,password) values ('".
                            $usernametext."','".
                            $passwordtext."');";
                    if($conn->query($sql2)===TRUE){
                        echo '<br>Insert on 2nd table';
                    }
                    else
                        echo 'Error on 2nd table '.$conn->error;
                }
                else{
                    echo 'Error'.$sql." ".$conn->error;
                }
                
            }
        
        $conn->close();
            }
            else{
                echo 'One or more values not entered';
            }
    }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <br><br><br>
   
    <h2><center>Registeration for LMS</center> </h2>
    
    <div style="text-align: center">
        <form action="" method="post" onsubmit="return click2()">
            Name : <input type="text" name='name' id="name"><br><br>
            Date of birth : <input type="text" name='dob' id="dob"><br><br>
            Username : <input type="text" name='username' id="username"><br><br>
            Password : <input type="text" name='password' id="password"><br><br>
            Mobile : <input type="text" name='mobile' id="mobile"><br><br>
            <input type="submit" name="registerbutton" onclick="click2()" value="Register"><br>
        </form>
    </div>
    <script>
        function click2(){
            var name = document.getElementById('name').value;
            var dob = document.getElementById('dob').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var mobile = document.getElementById('mobile').value;
            
            if(name == "" || dob == "" || username == "" || password == "" || mobile == ""){
                window.alert("Enter the details");
                return false;
            }
            
        }
        </script>
</body>

