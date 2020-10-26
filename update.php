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
    elseif($flag==1){
        $sem = $_POST['sem'];
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $name =$_POST['name'];
        $n = true;
        $s_name= array();
        $sql1 = "SELECT stud_nm FROM student WHERE department='".$dept."' and sem='".$sem."' and ay='".$ay."'";
        $result1=$con->query($sql1);
        while($values1=$result1->fetch_array()){
            $s_name[]=$values1['stud_nm'];
        }

        foreach($s_name as $d){
            if($d==$name){
                $n = false;
            }
        }
        print json_encode($n);
    }
    elseif($flag==2){
        $sem = $_POST['sem'];
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $name =$_POST['name'];
        $rno = $_POST['rno'];
        $o = true;
        $s_rno = array();
        $sql2 = "SELECT stud_rollno FROM student WHERE department='".$dept."' and sem='".$sem."' and ay='".$ay."' and stud_nm='".$name."'";
        $result2=$con->query($sql2);
        while($values2=$result2->fetch_array()){
            $s_rno[]=$values2['stud_rollno'];
        }

        foreach($s_rno as $e){
            if($e==$rno){
                $o = false;
            }
        }
        print json_encode($o);
    }
    elseif($flag==3){
        $sem = $_POST['sem'];
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $name =$_POST['name'];
        $rno = $_POST['rno'];
        $year = $_POST['year'];
        $sub_code = $_POST['sub_code'];
        $sub_id="";
        $stud_id = "";
        $sql3 = "SELECT sub_id FROM subject WHERE sub_code='".$sub_code."' and dept='".$dept."' and sem='".$sem."' and ay='".$ay."' and e_year='".$year."'";
        $result3 = $con->query($sql3);
        
        
        while($value = $result3->fetch_array()){
            $sub_id = $value['sub_id'];
        }
        
        $sql4 = "SELECT stud_id FROM student WHERE department='".$dept."' and sem='".$sem."' and ay='".$ay."' and stud_nm='".$name."' and e_year='".$year."'";
        $result4=$con->query($sql4);
        while($value1 = $result4->fetch_array()){
            $stud_id = $value1['stud_id'];
        }

        $sql5 = "SELECT * FROM marks_ WHERE stud_id='".$stud_id."' and sub_id='".$sub_id."' and ay='".$ay."'";
        $reuslt5 = $con->query($sql5);
        $row = $reuslt5->num_rows;

        print json_encode($row);
    }
    elseif($flag==4){
        $sem = $_POST['sem'];
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $name =$_POST['name'];
        $rno = $_POST['rno'];
        $year = $_POST['year'];
        $sub_code = $_POST['sub_code'];

        $sub_id="";
        $stud_id = "";
        $entry_done = false;
        $sql3 = "SELECT sub_id FROM subject WHERE sub_code='".$sub_code."' and dept='".$dept."' and sem='".$sem."' and ay='".$ay."' and e_year='".$year."'";
        $result3 = $con->query($sql3);
        
        
        while($value = $result3->fetch_array()){
            $sub_id = $value['sub_id'];
        }
        
        $sql4 = "SELECT stud_id FROM student WHERE department='".$dept."' and sem='".$sem."' and ay='".$ay."' and stud_nm='".$name."' and e_year='".$year."'";
        $result4=$con->query($sql4);
        while($value1 = $result4->fetch_array()){
            $stud_id = $value1['stud_id'];
        }
        $marks =array();
        $sql6 = "SELECT ia1,ia2,q1,q2,q3,q4,a1,a2,a3,a4,e1,e2,e3,e4,e5,e6,e7,e8,e9,e10,mp FROM marks_ WHERE stud_id='".$stud_id."' and sub_id='".$sub_id."' and ay='".$ay."'";
        $result6=$con->query($sql6);
        
        while($values6=$result6->fetch_array()){
            $marks['ia1'] = $values6['ia1'];
            $marks['ia2'] = $values6['ia2'];
            $marks['q1'] = $values6['q1'];
            $marks['q2'] = $values6['q2'];
            $marks['q3'] = $values6['q3'];
            $marks['q4'] = $values6['q4'];
            $marks['a1'] = $values6['a1'];
            $marks['a2'] = $values6['a2'];
            $marks['a3'] = $values6['a3'];
            $marks['a4'] = $values6['a4'];
            $marks['e1'] = $values6['e1'];
            $marks['e2'] = $values6['e2'];
            $marks['e3'] = $values6['e3'];
            $marks['e4'] = $values6['e4'];
            $marks['e5'] = $values6['e5'];
            $marks['e6'] = $values6['e6'];
            $marks['e7'] = $values6['e7'];
            $marks['e8'] = $values6['e8'];
            $marks['e9'] = $values6['e9'];
            $marks['e10'] = $values6['e10'];
            $marks['mp'] = $values6['mp'];
        }

        print json_encode($marks);
    }
    elseif($flag==5){
        $sem = $_POST['sem'];
        $dept=$_POST['dept'];
        $ay = $_POST['ay'];
        $name =$_POST['name'];
        $rno = $_POST['rno'];
        $year = $_POST['year'];
        $sub_code = $_POST['sub_code'];
        $ia1= $_POST['IA1'];
        $ia2= $_POST['IA2'];
        $q1= $_POST['Q1'];
        $q2= $_POST['Q2'];
        $q3= $_POST['Q3'];
        $q4= $_POST['Q4'];
        $a1= $_POST['A1'];
        $a2= $_POST['A2'];
        $a3= $_POST['A3'];
        $a4= $_POST['A4'];
        $e1= $_POST['E1'];
        $e2= $_POST['E2'];
        $e3= $_POST['E3'];
        $e4= $_POST['E4'];
        $e5= $_POST['E5'];
        $e6= $_POST['E6'];
        $e7= $_POST['E7'];
        $e8= $_POST['E8'];
        $e9= $_POST['E9'];
        $e10= $_POST['E10'];
        $mp= $_POST['MP'];

        $sub_id="";
        $stud_id = "";
        $entry_done = false;
        $sql3 = "SELECT sub_id FROM subject WHERE sub_code='".$sub_code."' and dept='".$dept."' and sem='".$sem."' and ay='".$ay."' and e_year='".$year."'";
        $result3 = $con->query($sql3);
        
        
        while($value = $result3->fetch_array()){
            $sub_id = $value['sub_id'];
        }
        
        
        $sql4 = "SELECT stud_id FROM student WHERE department='".$dept."' and sem='".$sem."' and ay='".$ay."' and stud_nm='".$name."' and e_year='".$year."'";
        $result4=$con->query($sql4);
        while($value1 = $result4->fetch_array()){
            $stud_id = $value1['stud_id'];
        }

        $sql7 = "UPDATE marks_ SET ia1='".$ia1."',ia2='".$ia2."',q1='".$q1."',q2='".$q2."',q3='".$q3."',q4='".$q4."',a1='".$a1."',a2='".$a2."',
                a3='".$a3."',a4='".$a4."',e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',e5='".$e5."',e6='".$e6."',e7='".$e7."',e8='".$e8."',
                 e9='".$e9."',e10='".$e10."',mp='".$mp."' WHERE  stud_id='".$stud_id."' and sub_id='".$sub_id."' and ay='".$ay."'";
    
        $result7=$con->query($sql7);
        if($result7){
            $entry_done=true;
        }
        print json_encode($entry_done);
    }