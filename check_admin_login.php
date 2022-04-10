<?php
include('database_connection.php');
// require_once './database_connection.php';
session_start();

$error = false;
$password_flag =  false;
$username_flag =  false;
$error_admin_password = "";
$admin_password = "";

if(empty($_POST["admin_password"]))
{
    $error = true;
    $password_flag = true;
    $error_admin_password = "PASSWORD IS EMPTY";
}
else{
    $admin_password = $_POST["admin_password"];
}

$error_admin_user_name = "";
$admin_user_name = "";

if(empty($_POST["admin_user_name"]))
{
    $error = true;
    $error_admin_user_name = "USERNAME IS EMPTY";
}
else{
    $admin_user_name = $_POST["admin_user_name"];
}

if($error == false)
{
    $query = "select id, password from admin where id = '{$admin_user_name}'";
    $statement = $connect->prepare($query);
    if($statement->execute())
    {
        $rowCount = $statement->rowCount();
        if($rowCount>0)
        {
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                if($admin_password == $row["password"])
                {
                    $_SESSION["admin_id"] = $row["id"];
                }
                else{

                    $error_admin_password = "WRONG PASSWORD";
                    $error = true;
                }
            }
        }
        else
        {
            $error_admin_user_name = "WRONG USERNAME";
            $error = true;

        }
    }
}
$output = array();

if($error == true)
{
    $output = array(

        'error'  => true,
        'error_admin_password' => $error_admin_password,
        'error_admin_user_name' => $error_admin_user_name
    );

}
else{
    $output = array(
        'success' => true
    );
}
echo json_encode($output);
?>