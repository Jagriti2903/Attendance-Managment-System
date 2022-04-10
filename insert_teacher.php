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
		$course_id = $_REQUEST['course_id'];
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
        $password = $_REQUEST['password'];
		$dob = $_REQUEST['dob'];
		$qualification = $_REQUEST['qualification'];
		$email = $_REQUEST['email'];
		$address = $_REQUEST['address'];
		$phone_number = $_REQUEST['phone_number'];

	

		
		$sql = "INSERT INTO teacher(id,course_id,first_name,last_name,password, dob,qualification,email,address,phone_number) VALUES ('$id', '$course_id',
			'$first_name','$last_name','$password','$dob','$qualification','$email','$address','$phone_number')";
		

		if(mysqli_query($conn, $sql)){

		//	echo ("<script Language='Javascript'> window.location.href='teacher.php'; document.write('Hey there');</script>");
			header("Location:teacher.php?s=6");
//			echo "<h3>data stored in a database successfully.";


			// echo nl2br("\n$first_name\n$qualification\n "
			// 	. "\n $course_id");
		} else{
		    
			header("Location:add_teacher.php?s=7");
			//echo ("<script Language='Javascript'>window.alert('Error: not added'); window.location.href='teacher.php';</script>");
			//echo "ERROR: Not added $sql. "
			//	. mysqli_error($conn);
		}
		
	   
		 

		mysqli_close($conn);

		//exit();
		?>
	</center>
</body>

</html>
