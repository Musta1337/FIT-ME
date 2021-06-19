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
        <form action="diet.php" method="post">
            <h1>Please enter the diet plan type</h1>
            <p>Please enter week or month to find weekly or monthly diets.</p>
            <label for="type">Diet Type</label>
            <input type="text" id=type name="type" placeholder="Please enter diet type">
            <button type="submit">Find</button>
        </form>
        <?php  // creating a database connection 
    if(isset($_POST["type"]))
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

   $q = "select * from Diet_Plan dp join nutrient_diet nd on (dp.diet_id = nd.diet_id) where dp.diet_weeks = '".$_POST["type"]."'";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
        echo "----------------------------------------------------<br>";
        echo "Diet ID: ".$row['DIET_ID']."<br>".
        "Diet Name:".$row['DIET_NAME']."<br>".
        "Diet Type: Weight ".$row['DIET_TYPE']."<br>".
        "DAY: ".$row['DAY']."<br>".
        "NUTRIENT NAME: ".$row['NUTRIENT_NAME']."<br>";
        echo "----------------------------------------------------<br>";
    }
            }
        ?>
    </body>
</html>