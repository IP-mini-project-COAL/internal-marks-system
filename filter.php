<?php  
    $flag = $_POST['flag'];
    $servername = "localhost";
    $username ="root";
    $password = "";
    $database = "dummy";

    $con = new mysqli($servername,$username,$password,$database);

    if(!$con)
    {
        die('Could not connect'.mysql_error());
    }   
    header("Content-Type: application/json; charset=UTF-8");

    //echo $database;

    if($flag==1){
        $depart = $_POST['department'];
    
        $names = array();
        $sql = "SELECT sub_code FROM subject WHERE dept='".$depart."' GROUP BY sem";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $names[]= $values['sub_code'];
        }
    
        print json_encode($names);
    }
    elseif($flag==2){
        $ay = $_POST['ayear'];

        $names = array();
        $sql = "SELECT sub_code FROM subject WHERE ay='".$ay."'";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $names[]= $values['sub_code'];
        }
    
        print json_encode($names);
    }
    elseif($flag==3){
        $depart = $_POST['department'];
        $ay = $_POST['ayear'];

        $names = array();
        $sql = "SELECT sub_code FROM subject WHERE ay='".$ay."' AND dept='".$depart."' GROUP BY sem";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $names[]= $values['sub_code'];
        }
    
        print json_encode($names);
    }
    elseif($flag==4){
        $subject = $_POST['subject'];
        
        $sql = "SELECT e_year FROM subject WHERE sub_nm='".$subject."'";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $year= $values['e_year'];
        }
        print json_encode($year);
    }
    elseif($flag==5){
        $subject = $_POST['subject'];
        
        $sql = "SELECT sub_code FROM subject WHERE sub_nm='".$subject."'";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $s_code= $values['sub_code'];
        }
        print json_encode($s_code);
    }
    elseif($flag==6){
        $subject_code = $_POST['sub_code'];
        
        $sql = "SELECT sub_nm FROM subject WHERE sub_code='".$subject_code."'";
        $result = $con->query($sql);
        //$row = $result->num_rows;//to get the length of result
      
        while($values = $result->fetch_array())
        {
            $sb_code= $values['sub_nm'];
        }
        print json_encode($sb_code);
    }

    ?>


