<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Find Diet Plan</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <?php  // creating a database connection 
    if(isset($_POST["box"]))
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

   $q = "select * from diet_plan where diet_name like '%".$_POST['box']."%'";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   echo "<br>";
   echo "SEARCH RESULT FOR DIET PLANS.";
   echo "<br>";
    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
        echo "----------------------------------------------------<br>";
        echo "DIET ID: ".$row['DIET_ID']."<br>".
        "DIET NAME: ".$row['DIET_NAME']."<br>".
        "DIET TYPE: ".$row['DIET_WEEKS']."<br>".
        "DIET GOAL: ".$row['DIET_TYPE']."<br>";
        echo "----------------------------------------------------<br>";
        }
    }
    $q = "select * from exercise where exercise_name like '%".$_POST['box']."%'";
   
    $query_id = oci_parse($con, $q); 		
    $r = oci_execute($query_id);
    echo "<br>";
    echo "SEARCH RESULT FOR EXERCISE NAME.";
    echo "<br>";
     while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
         echo "----------------------------------------------------<br>";
         echo "EXERCISE_NAME: ".$row['EXERCISE_NAME']."<br>".
         "Frequency: ".$row['FREQ']."<br>".
         "Exercise Equipment: ".$row['EXERCISE_EQUIPMENT']."<br>".
         "Exercise Time: ".$row['EXERCISE_TIME']."<br>";
         echo "----------------------------------------------------<br>";
     }
        ?>
    </body>
</html>