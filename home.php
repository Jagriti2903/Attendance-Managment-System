

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Index page</title>
	<style>

		#target_box{

			margin-left:auto;
			margin-right:auto;
			margin-top:50px;
			border:2px solid grey;
			width:30%;
            height:30%;
			padding:20px;
            border-radius:2rem;
            background-color: antiquewhite;

		}

        p{

            size:2rem;
        }

		

		button{

			/* width:25%;
			height:50%; */
            width:50%;
            height:2rem;
		    background-color: aliceblue;
            border-radius: 1rem;
			
		}

		button:hover{

			cursor:pointer;
			background-color: lightgreen;
			
		}

        #h_box{

    margin-top: 0px;        
    padding: 2rem 2rem;
    background-color: #dfe5e8;
}

h1{
    font-weight: 500;
    line-height: 1.2;
    font-size: 2.5rem;
}

        
	</style>
</head>

<body>


	

<?php
 
 

?>	
		
         <center>
	    <div id="h_box">
        <h1>Student Attendance System</h1>
        </div> 
			<div id='target_box'>
			<p>
            <a href = 'login.php' id='admin_login'><button>Admin</button>
			</p>

			<p>
            <a href = 'teacher_login.php' id='admin_login'><button>Teacher</button>
			</p>
</div>
    </center>
			
		
</div>
	
</body>

</html>
