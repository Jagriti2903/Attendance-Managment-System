<!DOCTYPE html>
<html>

<head>
	<title>Insert  page</title>
</head>

<body>
	<center>
		<?php
           
           include('header.php');

		$conn = mysqli_connect("localhost", "root", "", "attendance");
				
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$id = $_REQUEST['id'];
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$dob = $_REQUEST['dob'];
		$semester = $_REQUEST['semester'];
		$cgpa = $_REQUEST['cgpa'];
		

	

		
		$sql = "update student set id='$id',first_name='$first_name',last_name='$last_name',dob='$dob',semester='$semester',cgpa='$cgpa' where id='$id'";
		

		
		if ($conn->query($sql)) {
            echo'<br><br><br>Record updated successfully.
			<br><br>
			<div><a href = "view_student.php"><button type="button" id="ret_button" class="btn btn-info btn-sm ">Return</button></a></div>';
            }
            else {
            echo "Error: " . $sql . "<br>" . $connect->error;
            }
		
		
	   
		 

		mysqli_close($conn);

		//exit();
		?>
	</center>
</body>

</html>
