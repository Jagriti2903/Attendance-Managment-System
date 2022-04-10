<html>
    <head>
<title>Student Attendance System in PHP using Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
</head>
<style>h3{text-align:center}</style>

<div class="jumbotron-small text-center" style="margin-bottom:0">
  
</div>
<?php  
      include('head.php');
       $RNO = $_POST["roll_no"];
      $Date=$_POST["date"];
       $ATT= $_POST["att"];
      $TID=$_POST["tid"];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


else{
$stmt=$conn->stmt_init();
$stmt = $conn->prepare("INSERT INTO `attendance`.`attendance` (`r_no` ,`status`,`date`,`tid`) VALUES(?,?,?,?);" );
if($stmt)
$stmt->bind_param('ssss',$RNO,$ATT,$Date,$TID);
else
echo "NO";
if($stmt){
 $stmt->execute();
?> <h3 >SUCCESS!</h3><?php
}

}
?>  
 
<html>
 