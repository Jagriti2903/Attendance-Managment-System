<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add teacher's data</title>
    <style>
        #update_form {

            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            border: 2px solid grey;
            width: 40%;
            padding: 20px;
            margin-bottom: 50px;
            border-radius: 2rem;
            background-color:antiquewhite;


        }

        label {

            margin-left: 2px;


        }

        input {

            align-self: center;
            border: 1px solid grey;
            border-radius: 0.5rem;
        
            float: right;
            margin-right:50px;
           
        }

        button {

           
            border-radius: 2px;
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
    <?php

    include('header.php');
    if (isset($_GET['s'])) {
        $s = $_GET['s'];
        
        
        if ($s == 5) {
          echo "<center><h5 style='margin-top:50px; color:red;'>Error: Not able to update informationn</h5></center>";
        }
      }


    $phpvar = $_GET['id'];
  //  echo "$phpvar";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM teacher where id='$phpvar'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();


    echo ('<center>
    <h3 id="text_heading">Updating teacher</h3>
        <div id="update_form">
        <form action="update_teacher.php" method="post">

            <p>
                <label for="id">Id:</label>
                <input type="text" name="id" id="id" value=' . $row['id'] . ' readonly="readonly" required>
            </p>

            <p>
                <label for="course_id">Course id:</label>
                <input type="text" name="course_id" id="course_id" value=' . $row['course_id'] . '   required>
            </p>

            <p>
                <label for="FirstName">First Name:</label>
                <input type="text" name="first_name" id="first_name" value=' . $row['first_name'] . ' readonly="readonly" required>
            </p>

            <p>
                <label for="LastName">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value=' . $row['last_name'] . ' readonly="readonly" required>
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value=' . $row['password'] . '  required>
            </p>

            <p>
                <label for="DOB">Birth Date:</label>
                <input type="date" name="dob" id="dob" value=' . $row['dob'] . ' readonly="readonly" required>
            </p>

            <p>
                <label for="qualification">Qualification:</label>
                <input type="text" name="qualification" id="qualification" value=' . $row['qualification'] . '  required>
            </p>


            <p>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value=' . $row['email'] . ' required>
            </p>

            <p>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value=' . $row['address'] . ' required>
            </p>

            <p>
                <label for="ContactNo">Contact Number:</label>
                <input type="text" name="phone_number" id="phone_number" value=' . $row['phone_number'] . ' required>
            </p>

            <button id="submit_button" type="submit" >Submit</button>
        </form>
        </div>
    </center>');

    $sql2 = "update FROM teacher where id='$phpvar'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    ?>

</body>

</html>