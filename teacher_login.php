

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Add teacher's data</title>
	<style>

		#login_form{

			margin-left:auto;
			margin-right:auto;
			margin-top:30px;
			border:2px solid grey;
			width:25%;
			padding:20px;
			border-radius:2rem;
			background-color: antiquewhite;

		}

		label{

			margin-left:10px;
			

		}

		input{

			margin-right:20px;
			float:right;
		}

		button{

			/* width:25%;
			height:50%; */
		    background-color: #799be8;
			
		}

		button:hover{

			cursor:pointer;
			background-color: lightgreen;
			
		}

		#h_box{

margin-top: 0px;        
padding: 2rem 2rem;
background-color: #dfe5e8;
		}

		#teacher_heading{

			background-color:  #dfe5e8;
			width:30%;
			margin-bottom:0px;
			
			
		}
	</style>
</head>

<body>


	<center id=''>
	<div id='h_box'>
	<h1>Student Attendance System</h1>
	</div>

	<div id='teacher_heading'>
			<h2>Teacher's login</h2>

	</div>
	

<?php
 
 session_start();

 if(isset($_SESSION["teacher_id"]))
 {
   header('location:head.php');
 }

 if(isset($_GET['s']))
 {
	 $s=$_GET['s'];
	 if($s==2)
	 {
		 echo "<p style='color:red;'>Enter a valid password!</p>";
	 }

	 if($s==3)
	 {
		 echo "<p style='color:red;'>Enter a valid id!</p>";
	 }
 }

?>	
	
</div> 
    

	    <div id='login_form'>
		<form action="validate_teacher.php" method="post">
			
			<p>
				<label for="id">Id:</label>
				<input type="text" name="id" id="id" required>
			</p>

			<p>
				<label for="Password">Password:</label>
				<input type="password" name="password" id="password" required>
			</p>
			
			
			
			<button type="submit" value="Submit">Submit</button>
		</form>
</div>
	</center>
</body>

</html>
