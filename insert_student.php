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
		$ad_id=$_REQUEST['admin_id'];
        $cid=$_REQUEST['course'];
	

		
		$sql = "INSERT INTO student(id,first_name,last_name,admin_id,dob,semester,cgpa) VALUES ('$id',
			'$first_name','$last_name','$ad_id','$dob','$semester', '$cgpa')";
		$sql1="INSERT INTO enrolled(roll_no,course_id)VALUES ('$id',$cid)";


		if ($conn->query($sql)) {
            $conn->query($sql1);
            echo'<br><br><br>New record created successfully.
			<br><br>
			<div><a href = "view_student.php"><button type="button" id="ret_button" class="btn btn-info btn-sm ">Return</button></a></div>';
            }
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
		
	   
		 

		mysqli_close($conn);

		//exit();
		?>
	</center>
</body>

</html>
