<?php

include('header.php');

$phpvar = $_GET['id'];
//echo "$phpvar";
//echo gettype($phpvar);

echo "<html>
<head>
 <style>
  #info_box{

   text-align:center;
    border : 2px solid black;
    margin-top:50px;
    margin-left:auto;
    margin-right:auto;
    width : 40%;
    border-radius:2rem;
    padding:10px;
    background-color: aquamarine;
    
    
  }

  #left_span{

    color:#5e2689;
    font-weigth:900;
    float:left;
    margin-left:30px;
  }

  #right_span{

    float:right;
    margin-right:30px;
  }
  
  </style>
  </head>
  <body>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM teacher inner join course where teacher.id = '$phpvar' and  teacher.course_id = course.id ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
echo "<div id='info_box' align='center'>
<p>
<p><span id='left_span'>Teacher's name</span> :  <span id='right_span'>$row[first_name]  $row[last_name]</span></p>
<p><span id='left_span'>Email id</span>       :  <span id='right_span'>$row[email] </span></p>
<p><span id='left_span'>Course</span>         :  <span id='right_span'>$row[course_name]</span></p>  
<p><span id='left_span'>Address</span>         : <span id='right_span'>$row[address] </span> </p>
<p><span id='left_span'>Date of birth</span>   : <span id='right_span'>$row[dob] </span> </p>
<p><span id='left_span'>Qualification</span>   : <span id='right_span'>$row[qualification]</span></p>  
<p><span id='left_span'>Contact Number</span> : <span id='right_span'>$row[phone_number] </span> </p>

</p>
</div>
</body>
</html>";
?>