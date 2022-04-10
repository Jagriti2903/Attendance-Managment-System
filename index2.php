<?php

include('header.php');

?>

    <div class = "container mt-3 p-2 bg-light border mx-auto">
        <h2 style="text-align:center">OVERALL ATTENDANCE</h2>
        <table id="attendance" class="table table-striped">
            <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>ROLL NUMBER</th>
                    <th>ATTENDANCE PERCENTAGE</th>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>
<script>
    $(document).ready(function()
    {
        console.log("inside js");
        $('#attendance').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching" : true,
                "ordering" : false,
                "paging"   : false,
                ajax: {
                    url : 'attendance_action.php',
                    type : 'POST',
                    data : {'action' : 'fetch'}
                },
            }
        );
    });
</script>