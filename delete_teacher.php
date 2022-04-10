<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $phpvar = $_GET['id']; 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance";
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "Delete from teacher where id='$phpvar'";
    echo "$sql";
    if($conn->query($sql)===TRUE){

        header("location:teacher.php?s=1");
    }
    else{
        echo"Error";
    }
    $conn->close();
?>
    
</body>
</html>