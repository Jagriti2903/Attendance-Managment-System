<!DOCTYPE html>
<html lang="en">

<head>
    
</head>

<body>
    <?php

    $phpvar = $_GET['id'];
   // echo "$phpvar";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM student where id='$phpvar'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();


    echo ('<center>
        
        <form action="update_student.php" method="post">

            <p>
                <label for="id">Id:</label>
                <input type="text" name="id" id="id" value=' . $row['id'] . ' readonly="readonly" required>
            </p>

            <p>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" value=' . $row['first_name'] . ' required>
            </p>

            <p>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value=' . $row['last_name'] . ' required>
            </p>

            <p>
                <label for="dob">Date of birth:</label>
                <input type="date" name="dob" id="dob" value=' . $row['dob'] . ' required>
            </p>

            <p>
                <label for="semester">Semester:</label>
                <input type="text" name="semester" id="semester" value=' . $row['semester'] . '  required>
            </p>


            <p>
                <label for="cgpa">CGPA:</label>
                <input type="text" name="cgpa" id="cgpa" value=' . $row['cgpa'] . ' required>
            </p>

            <input type="submit" value="Submit">
        </form>
    </center>');

    

    ?>

</body>

</html>