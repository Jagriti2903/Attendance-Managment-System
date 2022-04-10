<html>
  <head>
<style>
table, th, td {
  border: 1px solid black;
text-align: center;

}
table{width: 100%;}
th, td {
  padding: 15px;
text-align: center;
}
h1,h2 {
  text-align: center;
}


tr:hover {background-color: #D6EEEE;}

</style>
</head>
<body>
<?php
include('head.php');
if($_GET['date'] && $_GET['r'])
{$date=$_GET['date'];$r=$_GET['r'];}
else
{$date=$_GET['date'];
$r=0;}
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<h1 padding-left:20px;>MARK ATTENDANCE</h1>

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
<td>First_name</td>
<td>Last_name</td>
<td>  Present</td>
<td>  Absent</td> 
<td>Mark</td>
</tr>

<?php
$t=$_SESSION['teacher_id'];
$sql="SELECT course_id from attendance.teacher where id=$t";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$c=$row['course_id'];

$sql = "SELECT * from attendance.student inner join attendance.enrolled on attendance.enrolled.roll_no=attendance.student.id and course_id=$c";
$result = $conn->query($sql);

if ($result) {  
  
  while($row = $result->fetch_assoc()) {
                                             //  $rr=$row["roll_no"];
                                             //  $sql2="SELECT * from dbms.attendance where date='$date' and  r_no=$rr and tid=$t";
                                              //echo $sql2;
                                              // $result2 = $conn->query($sql2);
                         // $rw2=$result->fetch_assoc();

?>
<tr>
  
 <td><?php echo  $row["roll_no"];?></td>
  <td><?php echo $row["first_name"];?></td>
 <td><?php echo $row["last_name"];?></td> 
<form method="post" action=submit.php>
<input type="hidden" name="tid"  value=<?php echo $_SESSION['teacher_id']?>>
<input type="hidden" name="roll_no" value=<?php echo  $row["roll_no"]?>>
<input type="hidden" name="date" value=<?php echo $date?>>
<td><input type="radio" name="att" value="present"></td>
<td><input type="radio" name="att" value="absent" checked ></td>

<td>                      <input type="submit" value=SUBMIT>                                                              </td>
<td>                     <?php 
// if($rw2){echo "MARKED";}   else    {echo "NOT MARKED";}?>       </td>
</form>

</tr>
<?php
}}?>
  

</table>
		   </div>
	   </div>
   </div>
 </div>

</body>
<html>


