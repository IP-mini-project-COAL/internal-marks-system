<?php
$servername = "localhost";
$usrname = "root";
$password = "";
$dbname = "dummy";


$conn = new mysqli($servername, $usrname, $password, $dbname);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
 


$h_r = $_POST['honorifics'];
$tid=$_POST['tid'];
$tname=$_POST['tname'];
$username=$_POST['username'];
$pass_=$_POST['pass'];

$pass = md5($pass_);

$enter="INSERT INTO users (teacher_id,honorifics,u_name,username,password,login_status) VALUES ('$tid','$h_r','$tname','$username','$pass','Logged Out')";
mysqli_query($conn,$enter);



?>