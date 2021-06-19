<?php
// Start the session
session_start();
?>
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
            <input type="text" id=user name="user" placeholder="@Enter the Member Name">
            <label for="password">Password</label>
            <input type="password" id=password name="password" placeholder="Enter your password">
            <button type="submit">LOG IN</button>
            <p>Don't have an account? <a href="register.html">Register now</a>.</p>
        </form>
        <?php  // creating a database connection 
    if(isset($_POST["password"]))
    {
        $db_sid = "  (DESCRIPTION =
        (ADDRESS=(PROTOCOL=tcp)(HOST=MUSTA-PC)(PORT=1521))
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

   $q = "select * from Member where member_name = '".$_POST["user"]."' and M_password = '".$_POST["password"]."'";
   
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
   $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
   if ($row) {
    header("Location: FrontPage.php");
    $_SESSION["member_id"] = $_POST["user"];
   }
   else {
       echo "user not found. try again.";
   }
   echo"<br>";
   echo"Record Inserted Successfully.You are now a Member of FitMe";
            }
        ?>
    </body>
</html>