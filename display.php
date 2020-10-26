<?php
    $servername = "localhost";
    $username ="root";
    $password = "";
    $database = "dummy";
    $flag = $_POST['flag'];
    $con = new mysqli($servername,$username,$password,$database);

    if(!$con)
    {
        die('Could not connect'.mysql_error());
    }   

    if($flag==0){
        $sub_code=$_POST['sub_code'];
        $sem = $_POST['sem'];
        
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $sda = array(true,true,true);
        $semester =array();
        $department =array();
        $ayear = array();
        $sql = "SELECT sem,dept,ay FROM subject WHERE sub_code='".$sub_code."'";
        $result = $con->query($sql);
        while($values = $result->fetch_array()){
            $semester[] = $values['sem'];
            $department[] = $values['dept'];
            $ayear[] = $values['ay'];
        }
        
        foreach($semester as $a){
            
            if($a==$sem){
                
              $sda[0]=false;
              
            }
        }
        foreach($department as $b){
            if($b==$dept){
                $sda[1]=false;
                
            }
        }
        foreach($ayear as $c){
            if($c==$ay){
                $sda[2]=false;
                
            }
        }
        print json_encode($sda);

    }
    ?>