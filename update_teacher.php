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

	

		
		$sql = "update teacher set id='$id',course_id= '$course_id',first_name='$first_name',last_name='$last_name',password='$password', dob='$dob',qualification='$qualification',email='$email',address='$address',phone_number='$phone_number' where id='$id'";
		

		if(mysqli_query($conn, $sql)){

           // echo "update successful";
			//echo ("<script Language='Javascript'> window.location.href='teacher.php'; document.write('Hey there');</script>");
			header("Location:teacher.php?s=4");
//			echo "<h3>data stored in a database successfully.";


			// echo nl2br("\n$first_name\n$qualification\n "
			// 	. "\n $course_id");
		} else{
		    
			header("Location:edit_teacher.php?s=5");
           // echo "error : not able to update";
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
