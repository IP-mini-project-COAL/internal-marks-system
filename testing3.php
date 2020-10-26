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
    $flag=$_POST['flag'];
    
    if($flag==1){ 
        $req = $_POST['q'];
        $semester =$_POST['semester'];
        $sql2 = "SELECT stud_nm FROM student where sem='".$semester."'";
        $result2 = $con->query($sql2);
        $studnm =array();
        $row2 = $result2->num_rows;//to get the length of result
        //printf("%d",$row2);  
        while($values2 = $result2->fetch_array())
        {
            $studnm[] = $values2['stud_nm'];
        }
    }
    elseif($flag==2){
        

        $req = $_POST['q'];
        $depart =$_POST['depart'];
        $sql2 = "SELECT stud_nm FROM student where department='".$depart."'";
        $result2 = $con->query($sql2);
        $studnm =array();
        $row2 = $result2->num_rows;//to get the length of result
        //printf("%d",$row2);  
        while($values2 = $result2->fetch_array())
        {
            $studnm[] = $values2['stud_nm'];
        }
    }
    elseif($flag==3){
        
        $req = $_POST['q'];
        $ay =$_POST['ay'];
        $sql2 = "SELECT stud_nm FROM student where ay='".$ay."'";
        $result2 = $con->query($sql2);
        $studnm =array();
        $row2 = $result2->num_rows;//to get the length of result
        //printf("%d",$row2);  
        while($values2 = $result2->fetch_array())
        {
            $studnm[] = $values2['stud_nm'];
        }
    }
    elseif($flag == 4){
       
        $req = $_POST['q'];
        $ay =$_POST['ay'];
        $depart =$_POST['depart'];
        $sql2 = "SELECT stud_nm FROM student where ay='".$ay."' and department='".$depart."'";
        $result2 = $con->query($sql2);
        $studnm =array();
        $row2 = $result2->num_rows;//to get the length of result
        //printf("%d",$row2);  
        while($values2 = $result2->fetch_array())
        {
            $studnm[] = $values2['stud_nm'];
        }
    }
        $n=0;
        
        $names =array();
        if($req !==""){
            $req =strtolower($req);
            $len =strlen($req);
            foreach($studnm as $name){
                if(stristr($req,substr($name,0,$len))){
                    if(in_array($name,$names)){}
                    else{
                            $names[$n]=$name;
                            $n+=1;
                        }
                }
                 
            }
             
        }
         
        
        print json_encode($names);
    ?>