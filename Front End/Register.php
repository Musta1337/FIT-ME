<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action=Register.php method="post">
        <h1>SIGN UP</h1>
        <p>Please Fill this form to create an account</p>
        <label for="Member_name">Name</label>
        <input type="text" id=Member_name name="Member_name" placeholder="@Please Enter your name">
        <label for="M_password">Password</label>
        <input type="password" id=M_password name="M_password" placeholder="@Please set Your account password">
        <label for="Age">Age</label>
        <input type="text" id=Age name="Age" placeholder="@Enter your age in number e.g.12">
        <label for="Gender">Gender</label>
        <input type="text" id=Gender name="Gender" placeholder="@Enter your Gender e.g.Male">
        <button type="submit">SIGN UP</button>
        <p>Already have an account? <a href="login.html">LOG IN</a>.</p>
    </form>
    <?php  // creating a database connection 
    if(isset($_POST["M_password"]))
    {
          $db_sid = 
          "  (DESCRIPTION =
          (ADDRESS=(PROTOCOL=tcp)(HOST=MUSTA-PC)(PORT=1521))
          (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = test)
          )
        )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
        
          $db_user = "fitadmin";   // Oracle username e.g "scott"
          $db_pass = "fitness";    // Password for user e.g "1234"
          $con = oci_connect($db_user,$db_pass,$db_sid); 
          if($con) 
            { echo "Oracle Connection Successful."; } 
          else 
            { die('Could not connect to Oracle: '); } 
   $q = "insert into Member(member_name,M_password,planID,member_type,Age,gender) VALUES ('".$_POST["Member_name"]."','".$_POST["M_password"]."', 1, 'none',".$_POST["Age"].", '".$_POST["Gender"]."')";
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   echo $r;
   echo"<br>";
   echo"Record Inserted Successfully.You are now a Member of FitMe";
     }
 ?> 
</body>
</html>