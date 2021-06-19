<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Log</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <form action=log.php method="post">
        <h1>Log Form</h1>
        <p>Please Fill this form to Record your today's workout.It will help you to keep track of your daily workout</p>
        <label for="w_Date">Date:</label>
        <input type="text" id=w_Date name="w_Date" placeholder="@Please Enter today's Date">
        <label for="workout_perc">Workout Percentage</label>
        <input type="text" id=workout_perc name="workout_perc" placeholder="@Please Enter your today's workout percentage">
        <label for="diet_perc">Diet Percentage:</label>
        <input type="text" id=diet_perc name="diet_perc" placeholder="@Enter your today's Diet percentage">
        <label for="BMI">BMI:</label>
        <input type="text" id=BMI name="BMI" placeholder="@Enter your BMI">
        <label for="weight">weight:</label>
        <input type="text" id=weight name="weight" placeholder="@Enter your weight measured today">
        <label for="muscle_mass">Muscle mass:</label>
        <input type="text" id=muscle_mass name="muscle_mass" placeholder="@Enter your Muscle mass">
        <button type="submit">Save Data</button>
    </form>
    <?php  // creating a database connection 
    if(isset($_POST["w_Date"]))
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
        $q = "select member_id from member where member_name = '".$_SESSION['member_id']."'";   
        $query_id = oci_parse($con, $q); 		
        $r = oci_execute($query_id);
        $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
        echo "".$row['MEMBER_ID']."";



   $q = "insert into Log(member_id, workout_perc, diet_perc, BMI, Weight, muscle_mass, Log_Date) VALUES (".$row['MEMBER_ID'].",".$_POST["workout_perc"].",".$_POST["diet_perc"].",".$_POST["BMI"].",".$_POST["weight"].",".$_POST["muscle_mass"].", TO_DATE('".$_POST["w_Date"]."', 'DD-MON-YYYY'))";   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   echo"<br>";
   echo"Your Today's Log file has been recorded Successfully.";
     }
 ?> 
</body>
</html>