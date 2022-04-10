<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    table {

      margin: 20px;
      border: 1px solid grey;
      text-align: center;
    }

    table tr td {

      padding: 20px;
      text-align: center;
      border: 1px solid grey;
    }

    #table_row:hover {

      background-color: peachpuff;
    }



    #view_button {

      background-color: violet;
      border-radius: 0.4rem;

    }

    #view_button:hover {

      background-color: lightgreen;

    }

    #edit_button {

      background-color: lightskyblue;
      border-radius: 0.4rem;

    }

    #edit_button:hover {

      background-color: lightgreen;

    }

    #delete_button {

      background-color: #ec7a4f;
      border-radius: 0.4rem;

    }

    #delete_button:hover {

      background-color: lightgreen;

    }

    button:hover {

      cursor: pointer;
      background-color: lightgreen;
    }

    #add_button {

      margin-right: 20px;
      width: 5rem;
      margin-top: 7px;
    }

    #add_button:hover {

      background-color: lightgreen;
      color: black;
    }


    /* .hidden {
      display: none;
    } */

    /* .show-modal{

      color:red;
      background-color: pink;
    } */
  </style>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php

  include('header.php');

  if (isset($_GET['s'])) {
    $s = $_GET['s'];
    if ($s == 1) {
      echo "<center><h5 style='margin-top:50px; color:green;'>Entry deleted Successfully</h5></center>";
    }

    if ($s == 4) {
      echo "<center><h5 style='margin-top:50px; color:green;'>Information updated successfully</h5></center>";
    }

    if ($s == 6) {
      echo "<center><h5 style='margin-top:50px; color:green;'> Added successfully</h5></center>";
    }
  }

  ?>
  <div align='right'>
    <a href="add_teacher.php"><button type="button" id="add_button" class="btn btn-info btn-sm" align='right'>Add</button></a>
  </div>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "attendance";


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT teacher.id as teacher_id,first_name, last_name,email,course_name FROM teacher inner join course where teacher.course_id = course.id";
  $result = $conn->query($sql);

  echo "
<div  align='center'>
<table id='teacher_table'>
      <thead>
       <tr >
        
        <th>Teacher Name</th>
        <th>Email Address</th>
        <th>Course</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
       </tr>
       </thead>
       <tbody>
";

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      // echo "<div id='box'>";

      echo "<tr id='table_row'>
   <td>" . $row["first_name"] .  ' ' . $row["last_name"] . "</td>
   <td>" . $row["email"] . "</td>
   <td>" . $row["course_name"] . "</td>
   <td><a href = 'view_teacher.php?id=" . $row["teacher_id"] . "'><button  type='button' id='view_button'  >View </button></a></td>
   <td><a href = 'edit_teacher.php?id=" . $row["teacher_id"] . "'><button  type='button' id='edit_button'  >Edit </button></a></td>
   <td><a href='delete_teacher.php?id=" . $row["teacher_id"] . "'><button id='delete_button' onclick='myFunction()'>Delete</button></a></td>
    </tr>";
    }

    echo "</tbody>
    </table>
    </div>";
  } else {
    echo "No entries are there";
  }
  $conn->close();

  ?>

  <script src="script.js"></script>

</body>




</html>