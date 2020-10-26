<?php
$servername = "localhost";
$usrname = "root";
$password = "";
$dbname = "dummy";
$flag = $_POST['flag'];

$conn = new mysqli($servername, $usrname, $password, $dbname);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
else{
  
if($flag==1){
  $username=$_POST['username'];
  $pass_=$_POST['pass'];
  $pass = md5($pass_);

  $sql="SELECT * FROM users WHERE username='".$username."' AND password='".$pass."'";
  $res= mysqli_query($conn, $sql);
  if($res){
    
    $sql2 = "UPDATE users SET login_status='Logged In' WHERE username='".$username."' AND password='".$pass."'";
    $result=$conn->query($sql2);
  }
  
  //$row = mysqli_fetch_array($res);
  $count = $res->num_rows;
  

  print json_encode($count) ;
}
elseif($flag==2){
  $username1=$_POST['username'];

  
  $hr_name = array();
  $sql1="SELECT honorifics,u_name FROM users WHERE username='".$username1."'";

  $result = $conn->query($sql1);
  
  while($values = $result->fetch_array()){
    $hr_name['hr']= $values['honorifics'];
    $hr_name['name'] = $values['u_name'];
  }
  
  print json_encode($hr_name);
}
elseif($flag==3){
  $username=$_POST['username'];
  $loggedout=false;
  $sql2 = "UPDATE users SET login_status='Logged Out' WHERE username='".$username."'";
  $result=$conn->query($sql2);

  if($result){
    $loggedout = true;
  }
  print json_encode($loggedout);
}
}

?>