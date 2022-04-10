<!DOCTYPE html>
<html>

<head>
	<title>Validate</title>
</head>

<body>
	<center>
		<?php


session_start();
		$conn = mysqli_connect("localhost", "root", "", "attendance");

		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}


		

		$id = $_REQUEST['id'];
		$password = $_REQUEST['password'];


		$sql = "SELECT * FROM teacher where id='$id' ";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();
		if ($result->num_rows > 0) {

			$sql2 = "SELECT * FROM teacher where teacher.password='$password' and id= '$id' ";
			$result2 = $conn->query($sql2);

			$row2 = $result2->fetch_assoc();
            
			if ($result2->num_rows > 0)
			{
				$_SESSION['teacher_id'] = $row['id'];
				header("location:head.php");
			}

			else
			{
               // echo "Please enter a valid password";
			    header("location:teacher_login.php?s=2");
			}
			
		} 

		else 
		{
		//	echo "Please enter a valid id";
			header("location:teacher_login.php?s=3");
		}

		?>
	</center>
</body>

</html>