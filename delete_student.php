<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete student data</title>
</head>

<body>
    <center>
    <?php
    include('header.php');

    $phpvar = $_GET['id'];
    //echo "$phpvar";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM student where id='$phpvar'";
    if ($conn->query($sql)) {
        echo'<br><br><br>Record deleted successfully.
        <br><br>
        <div><a href = "view_student.php"><button type="button" id="ret_button" class="btn btn-info btn-sm ">Return</button></a></div>';
        }
        else {
        echo "Error: " . $sql . "<br>" . $connect->error;
        }
    ?>

    </body>
    
    </html>