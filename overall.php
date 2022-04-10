<html>
<style>
table, th, td {
  border: 1px solid black;
text-align: center;

}

th, td {
  padding: 15px;
text-align: center;
}
h1,h2 {
  text-align: center;
}

th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
text-align: center;
}
tr:nth-child(even) {
  background-color:'blue';
}
tr:hover {background-color: #D6EEEE;}</style>

<?php
include('head.php');


$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>  

<h1 text-align:center> OVERALL ATTENDANCE</h1>
<div class="container" style="margin-top:30px">
   <div class="card">
	   <div class="card-header">
	   <div class="row">
		 <div class="col-md-9">Student List</div>
		 <div class="col-md-3" align="right">
		 
		 </div>
	   </div>
	 </div>
	   <div class="card-body">
		   <div class="table-responsive">
			 <span id="message_operation"></span>
			 <table class="table table-striped table-bordered" id="student_table">
	 


<tr>

<td>Roll no</td>
<td>Percentage attendance</td>

</tr>

<?php

$t=$_SESSION["teacher_id"];
$sql="SELECT count(distinct date) as d from attendance.attendance where tid=$t ;";
$result = $conn->query($sql);
$r=$result->fetch_assoc();
$s=$r["d"];

$sql = "SELECT r_no,s.first_name,count(distinct date) as days FROM attendance.attendance,attendance.student s where status='present' and s.id=r_no and tid=$t group by r_no order by r_no";
$result = $conn->query($sql);

if ($result) {
  
  while($row = $result->fetch_assoc()) {?>

<tr>

 <td><?php echo  $row["r_no"];?></td>
  <td><?php echo $row["days"]/$s*100?>%</td>

</tr>
<?php
  }
?>
<?php
} else {
  echo "0 results";
}
$conn->close();
?></table>
		   </div>
	   </div>
   </div>
 </div>
</html>