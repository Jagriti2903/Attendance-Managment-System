<!DOCTYPE html>
<html lang="en">

<head>
	<title>Add teacher's data</title>
	<style>
		#login_form {

			margin-left: auto;
			margin-right: auto;
			margin-top: 40px;
			border: 2px solid grey;
			width: 40%;
			padding: 20px;
			margin-bottom: 50px;
			border-radius: 2rem;
			background-color: antiquewhite;


		}

		label {

			margin-left: 10px;


		}

		input {

			border: 1px solid grey;
			border-radius: 0.5rem;
			margin-right: 20px;
			float: right;
		}

		button {

			/* width:25%;
height:50%; */
			border-radius: 0.5rem;
			background-color: #799be8;

		}

		button:hover {

			cursor: pointer;
			background-color: lightgreen;

		}

		#text_heading {

			margin-top: 20px;
			color: #a98dc3;


		}
	</style>
</head>

<body>
	<center id=''>
        <?php
		include('header.php');

		?>
		<h3 id="text_heading">Adding teacher's data to database</h3>
		<?php

		
		if (isset($_GET['s'])) {
			$s = $_GET['s'];


			if ($s == 7) {
				echo "<center><h5 style='margin-top:50px; color:red;'>Error: Please enter valid information</h5></center>";
			}
		}


		?>
		<div id="login_form">
			<form action="insert_teacher.php" method="post">

				<p>
					<label for="id">Id:</label>
					<input type="text" name="id" id="id" required>
				</p>

				<p>
					<label for="course_id">Course id:</label>
					<input type="text" name="course_id" id="course_id" required>
				</p>

				<p>
					<label for="FirstName">First Name:</label>
					<input type="text" name="first_name" id="first_name" required>
				</p>

				<p>
					<label for="LastName">Last Name:</label>
					<input type="text" name="last_name" id="last_name" required>
				</p>

				<p>
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" required>
				</p>

				<p>
					<label for="DOB">Date of birth:</label>
					<input type="date" name="dob" id="dob" required>
				</p>

				<p>
					<label for="qualification">Qualification:</label>
					<input type="text" name="qualification" id="qualification" required>
				</p>


				<p>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" required>
				</p>

				<p>
					<label for="address">Address:</label>
					<input type="text" name="address" id="address" required>
				</p>

				<p>
					<label for="ContactNo">Contact Number:</label>
					<input type="text" name="phone_number" id="phone_number" required>
				</p>

				<button type="submit">Submit</button>
			</form>
		</div>
	</center>
</body>

</html>