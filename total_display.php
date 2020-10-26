<?php
$servername = "localhost";
$usrname = "root";
$password = "";
$dbname = "dummy";


$con = new mysqli($servername, $usrname, $password, $dbname);

$ay= $_GET['ay'];
$year= $_GET['year'];
$dept = $_GET['dept'];
$sem= $_GET['sem'];

$sub_code=$_GET['sub_code'];

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
  $sub_id="";
  $sql1="SELECT sub_id FROM subject WHERE sub_code='".$sub_code."' and dept='".$dept."' and sem='".$sem."' and ay='".$ay."' and e_year='".$year."'";
  $res1 = $con->query($sql1);
  while($value=$res1->fetch_array()){
    $sub_id = $value['sub_id'];
  }            
        
  $sql ="SELECT student.stud_rollno,student.stud_nm,marks_.ia1,marks_.ia2,marks_.q1,marks_.q2,marks_.q3,marks_.q4,
  marks_.a1,marks_.a2,marks_.a3,marks_.a4,marks_.e1,marks_.e2,marks_.e3,marks_.e4,marks_.e5,
  marks_.e6,marks_.e7,marks_.e8,marks_.e9,marks_.e10,marks_.mp FROM marks_ INNER JOIN
   subject ON marks_.sub_id=subject.sub_id INNER JOIN student on marks_.stud_id= student.stud_id WHERE subject.sub_id='".$sub_id."'
     ORDER BY student.stud_rollno ASC";

  $result = $con->query($sql);
  if($result===false){
    echo "Hi";
  }
  
?>
<html>
<head>
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link type="text/css" rel="stylesheet" href="display 1.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<meta name="viewport" content="width=device-width">

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
</body>
<br><br>
<div class="container">
  <div class="back" id="back"><i class="fas fa-long-arrow-alt-left"></i> Home</div>
    <td><h3 align="left"><u>Academic Year:</u> <?php echo $ay ?></h3>
    <h3 align="left"><u>Year:</u> <?php echo $year ?></h3>
    <h3 align="left"><u>Department:</u> <?php echo $dept ?></h3>
    <h3 align="left"><u>Semester:</u> <?php echo $sem ?></h3>
    <h3 align="left" id="subject_display"></h3>
    
    <br><br>
   
<table class="responsive-table" >
  <thead>
    <tr align="center">
      <th rowspan='2'>Roll_No</th>
      <th rowspan='2'>Stud_Name</th>
      <th colspan='2'>Internal Assesment</th>
      <th colspan='4'>Quiz</th>
      <th colspan='4'>Assignment</th>
      <th colspan='10'>Experiments</th>
      <th rowspan='2'>MP</th>
    </tr>
    <tr align="center">
      <th>IA1</th>
      <th>IA2</th>
      <th>Q1</th>
      <th>Q2</th>
      <th>Q3</th>
      <th>Q4</th>
      <th>A1</th>
      <th>A2</th>
      <th>A3</th>
      <th>A4</th>
      <th>E1</th>
      <th>E2</th>
      <th>E3</th>
      <th>E4</th>
      <th>E5</th>
      <th>E6</th>
      <th>E7</th>
      <th>E8</th>
      <th>E9</th>
      <th>E10</th>
    </tr>
  </thead>
  <tbody>
    <?php
      
      while($row = $result->fetch_array()){
          echo "<tr align='center'><td>{$row['stud_rollno']}</td><td>{$row['stud_nm']}</td><td>{$row['ia1']}</td><td>{$row['ia2']}</td><td>{$row['q1']}</td><td>{$row['q2']}</td><td>{$row['q3']}</td><td>{$row['q4']}</td><td>{$row['a1']}</td><td>{$row['a2']}</td><td>{$row['a3']}</td><td>{$row['a4']}</td><td>{$row['e1']}</td><td>{$row['e2']}</td><td>{$row['e3']}</td><td>{$row['e4']}</td><td>{$row['e5']}</td><td>{$row['e6']}</td><td>{$row['e7']}</td><td>{$row['e8']}</td><td>{$row['e9']}</td><td>{$row['e10']}</td><td>{$row['mp']}</td>    \n";
        }
      
    ?>
  </tbody>
</table>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
let queryString1 = decodeURIComponent(location.search.substring(1)),
    a = queryString1.split("&");
document.getElementById("subject_display").innerHTML = "<u>Subject:</u> " +a[1];
</script>
</body>
</html>