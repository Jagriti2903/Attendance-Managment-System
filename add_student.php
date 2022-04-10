<?php

include('header.php');
$conn = new PDO("mysql:host=localhost;dbname=attendance","root","");


?>
	<center>
		
	<div class="container mt-3 bg-light">
		<form action="insert_student.php" method="post">
			
			
            <p>
            	<label for="id">Roll No:</label>
				<input type="text" name="id" id="id" required>
			</p>


            <p>
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" id="first_name" required>
			</p>


            <p>
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" id="last_name" required>
			</p>
			<p>
				<label for="admin_id">Admin id:</label>
				<input type="text" name="admin_id" id="admin_id" required>
			</p>
			

            <p>
				<label for="dob">Date of Birth:</label>
				<input type="date" name="dob" id="dob" required>
			</p>

			<p>
				<label for="semester">Semester:</label>
				<input type="text" name="semester" id="semester" required>
			</p>

            <p>
				<label for="cgpa">CGPA:</label>
				<input type="text"  name="cgpa" id="cgpa" required >
			</p>

			<p>
				<label for="course">Select Course</label>
				<select name="course" id="course" multiple="multiple" required>
				<?php
				$query = "select id, course_name from course";
				$statement = $conn->prepare($query);
  	            $statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row)
				{
					echo '<option value='."{$row['id']}>"."{$row['course_name']}".'</option>';
				}
				$conn = NULL;
				?>
				</select>
			</p>
		
		


			
			<input type="submit" value="Submit">
			
		</form>
	</center>
</body>
</div>

</html>