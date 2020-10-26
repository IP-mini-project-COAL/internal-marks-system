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
    $username=$_POST['username'];

    $sql = "SELECT * FROM users WHERE username='".$username."'";
    $result = $con->query($sql);
    $rows = $result->num_rows;

    print(json_encode($rows));

?>