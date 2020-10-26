<?php  
    
    $servername = "localhost";
    $username ="root";
    $password = "";
    $database = "dummy";

    $con = new mysqli($servername,$username,$password,$database);

    if(!$con)
    {
        die('Could not connect'.mysql_error());
    }   
    $loggedin=false;
    $status="";
    $username = $_POST['username'];
    $sql = "SELECT login_status FROM users WHERE username='".$username."'";
    $result = $con->query($sql);

    while($values=$result->fetch_array()){
        $status = $values['login_status'];
    }

    if($status=="Logged In"){
        $loggedin=true;
    }

    print json_encode($loggedin);
