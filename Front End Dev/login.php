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
        <?php  // creating a database connection 
            if(isset($_POST["M_password"]))
            {
                $db_sid = "(DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = MUSTA-PC.mshome.net)(PORT = 1521))
                (CONNECT_DATA =
                  (SERVER = DEDICATED)
                  (SERVICE_NAME = test)
                )
              )";// Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN)
                $db_user = "fitadmin";   // Oracle username e.g "scott"
                $db_pass = "fitness";    // Password for user e.g "1234"
                $con = oci_connect($db_user,$db_pass,$db_sid); 
                
        if($con) 
                { echo "Oracle Connection Successful."; } 
            else 
                { die('Could not connect to Oracle: '); }

        $q = "insert into Member(member_name,M_password,planID,member_type,Age,gender) VALUES (".$_POST["member_name"].",".$_POST["M_password"].", 'none', 'none',".$_POST["Age"].", ".$_POST["Gender"].")";
        
        /*
        member_id int NOT NULL,
        member_name varchar(25),
        M_password varchar(50) NOT NULL,
        planID int NOT NULL,
        member_type varchar(25) NOT NULL,
        Age NUMBER(3) NOT NULL,
        gender varchar(6) NOT NULL,
        */
        $query_id = oci_parse($con, $q); 		
        $r = oci_execute($query_id);
        echo"<br>";
        echo"Record Inserted Successfully.You are now a Member of FitMe";
            }
        ?>
    </body>
</html>