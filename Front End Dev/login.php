<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LogIN</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <img src="Person.png" class="img"> 
            <h1>Log In</h1>
            <p>Please Fill this form to Log into your account</p>
            <label for="user">Member ID:</label>
            <input type="text" id=user name="user" placeholder="@Enter the Member ID assigned to you by FITME">
            <label for="password">Password</label>
            <input type="password" id=password name="password" placeholder="Enter your password">
            <button type="submit">LOG IN</button>
            <p>Don't have an account? <a href="register.html">Register now</a>.</p>
        </form>
        <?php
            if (isset($_POST["user"]))
            {
                $db_sid = 
                "(DESCRIPTION =
                 (ADDRESS = (PROTOCOL = TCP)(HOST = MUSTA-PC.mshome.net)(PORT = 1521))
                 (CONNECT_DATA =
                   (SERVER = DEDICATED)
                   (SERVICE_NAME = test)
                 )
               )";

                $db_user = "fitadmin";
                $db_pass = "fitness";
                $con = oci_connect($db_user,$db_pass,$db_sid); 
                if($con) 
                   { echo "Oracle Connection Successful."; } 
                else 
                   { die('Could not connect to Oracle: '); } 

                $q = "select  ".$_POST["user"].;
                $query_id = oci_parse($con, $q); 		
                $r = oci_execute($query_id); 


                /*
                	 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                        { 
                            echo "----------------------------------------------------<br>";
                            echo "First Name: ".$row['FIRST_NAME']."<br>"."Last Name: ".$row['LAST_NAME']."<br>"."Employee ID: ".$row['EMPLOYEE_ID']."<br>"
                            ."Email: ".$row['EMAIL']."<br>"."Phone Number: ".$row['PHONE_NUMBER']."<br>"."Hire Date: ".$row['HIRE_DATE']."<br>"
                            ."Job_id: ".$row['JOB_ID']."<br>"."Salary: ".$row['SALARY']."<br>"."Commission: ".$row['COMMISSION_PCT']."<br>"
                            ."Manager: ".$row['MANAGER_ID']."<br>"."Department ID: ".$row['DEPARTMENT_ID']."<br>";
                            echo "----------------------------------------------------<br>";
                        }
                */
            }
        ?>
    </body>
</html>