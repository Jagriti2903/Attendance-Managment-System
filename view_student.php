
<?php

include('header.php');

if(isset($_SESSION['x']))
{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'."{$_SESSION['x']}".'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>

 
				   

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student.id, student.first_name, student.last_name, student.dob, student.semester, student.cgpa, course.course_name, course.credits FROM student INNER JOIN enrolled ON
student.id = enrolled.roll_no INNER JOIN course ON
course.id = enrolled.course_id";
$result = $conn->query($sql);

echo'
<div class="container" style="margin-top:30px">
   <div class="card">
	   <div class="card-header">
	   <div class="row">
		 <div class="col-md-9">Student List</div>
		 <div class="col-md-3" align="right">
		 <a href = "add_student.php"><button type="button" id="add_button" class="btn btn-info btn-sm ">Add</button></a>
		 </div>
	   </div>
	 </div>
	   <div class="card-body">
		   <div class="table-responsive">
			 <span id="message_operation"></span>
			 <table class="table table-striped table-bordered" id="student_table">
			 <thead>
			 <tr>
				 <th>Roll No</th>
				 <th>First Name</th>
			   <th>Last Name</th>  
				 <th>Date of Birth</th>
				 <th>Course</th>
				 <th>Semester</th>
			   <th>CGPA</th>
				 <th>Edit</th>
				 <th>Delete</th>
			 </tr>
		 </thead>';
		 if ($result->num_rows > 0) {
  
			while($row = $result->fetch_assoc()) {
		 echo'<tbody>
		 <tr>
		  <td>'.$row["id"]. '</td>
		  <td>'.$row["first_name"]. '</td>
		<td>'.$row["last_name"]. '</td>  
		  <td>'.$row["dob"]. '</td>
		  <td>'.$row["course_name"]. '</td>
		  <td>'.$row["semester"]. '</td>
		<td>'.$row["cgpa"]. '</td>
		<td><a href = "edit_student.php?id=' .$row["id"].'"><button  type="button" id="edit_button"  class="btn btn-primary btn-sm edit_student">Edit </button></a></td>
		<td><a href = "delete_student.php?id=' .$row["id"].'"><button  type="button" id="delete_button" class="btn btn-danger btn-sm delete_student">Delete </button></a></td>
	  </tr>
		 </tbody>';
		}
			}
			echo' </div>
			 </div>
		 </div>
	   </div>';

unset($_SESSION['x']);
$conn->close();

?>