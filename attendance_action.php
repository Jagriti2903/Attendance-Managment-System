<?php



include('database_connection.php');
if($_POST['action'] == "fetch")
{
    $query1 = "select count(distinct date) as total from attendance";
    $count = array();
    $statement = $connect->prepare($query1);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $count[] = $row['total'];
    }
    $search = "";
    if(isset($_POST['search']['value']))
    {
        $search = $_POST['search']['value'];
    }

    $result = $statement->fetchAll();
    $query2 = "select s.first_name, s.last_name, s.id, (count(a.date)*100/{$count[0]}) as percentage from student s inner join attendance a on s.id = a.r_no where s.first_name like '{$search}%' and  a.status = 'present' group by s.id
    union
    select distinct s.first_name , s.last_name, s.id, 0 from student s inner join attendance a on s.id = a.r_no where not exists(select * from student t inner join attendance b on t.id = b.r_no where t.id = s.id and b.status = 'present') and s.first_name like '{$search}%' group by s.id;
    ";
    
    if($count[0] != 0)
    {
        $statement = $connect->prepare($query2);
        $statement->execute();
        $result = $statement->fetchAll();
        $rawdata = array();
        foreach($result as $row)
        {
            $subarray = array();
            $subarray[] = $row['first_name'];
            $subarray[] = $row['last_name'];
            $subarray[] = $row['roll_no'];
            $subarray[] = $row['percentage'];
            $rawdata[] = $subarray;
        }

        // $query3 = "select count(*) from student;";
        // $statement2 = $connect->prepare($query3);
        // $statement2->execute();
        // $result2 = $statement2->fetchAll();

        // $noOfStudents =  array();
        // foreach($result2 as $row2)
        // {
        //     $noOfStudents[] = $row['percentage'];
        // }
        
       
        $filtered_rows = $statement->rowCount();
        $recordTotal = $statement->rowCount();
        $draw = intval($_POST['draw']);

        $data['recordsTotal'] = $recordTotal;
        $data['recordsFiltered'] = $filtered_rows;
        $data['draw'] = $draw;
        $data['data'] = $rawdata;

        echo json_encode($data);

    }
    else
    {   
        $rawdata = [[]];
        $data['recordsTotal'] = 0;
        $data['recordsFiltered'] = 0;
        $data['draw'] = $draw;
        $data['data'] = $data;

        echo json_encode($data);
    }

    
}


?>

