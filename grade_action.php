<?php


//grade_action.php

include('database_connection.php');
session_start();
$output = '';
if(isset($_POST["action"]))
{
 if($_POST["action"] == 'fetch')
 {
  $query = "SELECT * FROM course ";
  if(isset($_POST["search"]["value"]))
  {
   $query .= 'WHERE course_name LIKE "%'.$_POST["search"]["value"].'%" ';
  }
  if(isset($_POST["order"]))
  {
   $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
  }
  else
  {
   $query .= 'ORDER BY id DESC ';
  }
  if($_POST["length"] != -1)
  {
   $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $data = array();
  $filtered_rows = $statement->rowCount();
  foreach($result as $row)
  {
   $sub_array = array();
   $sub_array[] = $row["course_name"];
   $sub_array[] = $row["credits"];
   $sub_array[] = '<button type="button" name="edit_grade" class="btn btn-primary btn-sm edit_grade" id="'.$row["id"].'">Edit</button>';
   $sub_array[] = '<button type="button" name="delete_grade" class="btn btn-danger btn-sm delete_grade" id="'.$row["id"].'">Delete</button>';
   $data[] = $sub_array;
  }

  $output = array(
   "draw"    => intval($_POST["draw"]),
   "recordsTotal"  =>  $filtered_rows,
   "recordsFiltered" => get_total_records($connect, 'course'),
   "data"    => $data
  );
  echo json_encode($output);
 }

if($_POST["action"] == "Add" || $_POST["action"] == "Edit")
 {
//   $output = array(
//       'success' =>true,
//       'hello' =>"hello"
//   );
//   echo json_encode($output);
  $grade_name = '';
  $grade_credits = 0;
  $error_grade_credits = '';
  $error_grade_name = '';
  $error = 0;

  if(empty($_POST["grade_name"]) || empty($_POST["grade_credits"]))
  {
    if(empty($_POST["grade_name"]))
    {
        $error_grade_name = 'Course Name is required';
        $error++;
    }
    if(empty($_POST["grade_credits"]))
    {
        $error_grade_credits = 'Credits is required';
        $error++;
    }
  }
  else
  {
   $grade_name = $_POST["grade_name"];
   $grade_credits = $_POST["grade_credits"];
  }
  if($error > 0)
  {
   $output = array(
    'error'       => true,
    'error_grade_name'    => $error_grade_name,
    'error_grade_credits'   =>$error_grade_credits
   );
  }
  else
  {
   if($_POST["action"] == "Add")
   {
    // $data = array(
    //  ':grade_name'    => $grade_name
    // );
    $flag = false;
    $query1 = "select course_name from course where course_name = '{$grade_name}'";
    $statement = $connect->prepare($query1);
    
    if($statement->execute())
    {
      if($statement->rowCount() > 0)
      {
        $flag = true;
      }
    }
    if($flag == false)
    {

    
      $query = "
      INSERT INTO course 
      (course_name,credits) 
      values ('{$grade_name}','{$grade_credits}');
      ";

      //   $output = array(
      //   'success' =>true,
      //   'hello' =>"hello",
      //   'query' => $query
      //     );
      // echo json_encode($output);
      $statement= $connect->prepare($query);
      // $statement->execute();

      //     $output = array(
      //         'success' => "data added successfully",

      //     );
      //     
      if($statement->execute())
      {
      if($statement->rowCount() > 0)
      {
        $output = array(
        'success'  => 'Data Added Successfully',
        );
      }
      else
      {
        $output = array(
        'error'     => true,
        'error_grade_name' => 'ERROR'
        );
      }
      }
      else
      {
        $output = array(
        'error'     => true,
        'error_grade_name' => 'query error',
        'error_grade_credits' => ''
        );  
      }
    }
    else
    {
      $output = array(
        'error' => true,
        'error_grade_name' => 'Course Name Already Exists',
        'error_grade_credits' => ''
      );
    }
  }
    if($_POST["action"] == "Edit")
   {
      
    $grade_name = $_POST['grade_name'];
    $grade_id = $_POST['grade_id'];
    $credits = $_POST['grade_credits'];
    // $data = array(
    //  ':grade_name'    => $grade_name,
    //  ':grade_id'     => $_POST["grade_id"]
    // );

    
    $query = "
    UPDATE course 
    SET course_name = '{$grade_name}', credits = {$credits}
    WHERE id = {$grade_id}
    ";
    // $output = array(
    //     'success' => true,
    //     'name' => $grade_name,
    //     'id' => $grade_id,
    //     'credits' => $credits,
    //     'query' => $query
    // );
    $statement = $connect->prepare($query);
    if($statement->execute())
    {
     $output = array(
      'success'  => 'Data Updated Successfully',
     );
    }
    else
    {
        $output = array(
            'error' => true,
             'message' => 'sql error'
        );
    }
   }

}
    echo json_encode($output);
}
if($_POST["action"] == "edit_fetch")
 {
  $output = array(
  );
  $query = "SELECT id,course_name, credits FROM course WHERE id = {$_POST['grade_id']}";
  $statement = $connect->prepare($query);
  if($statement->execute())
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    $output['grade_name'] = $row["course_name"];
    $output['grade_id'] = $row['id'];
    $output['credits'] = $row['credits'];
   }
   
  }
  echo json_encode($output);
 }
if($_POST["action"] == "delete")
 {
  $message="";
  $query = "DELETE FROM course WHERE id = {$_POST['grade_id']}";
  $statement = $connect->prepare($query);
  if($statement->execute())
  {
    echo "deleted successfully!";
  }
 }

}

?>