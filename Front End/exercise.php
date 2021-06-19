<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Find Exercise Plan</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form action="exercise.php" method="post">
            <h1>Please enter the exercise type</h1>
            <p>Please enter the type of exercise you want to find.</p>
            <label for="type">Exercise Type</label>
            <input type="text" id=type name="type" placeholder="Please enter exercise type">
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

   $q = "select distinct e.exercise_name, e.freq, e.exercise_equipment, e.exercise_time from muscle_workout mw join workout_plan wp on (mw.planID = wp.planID) join muscle_group mg on (mg.muscle_group = mw.muscle_group) join exercise e on (e.exercise_name = mg.exercise_name) where wp.plan_type = '".$_POST['type']."'";
   /*
   select distinct e.exercise_name from muscle_workout mw join workout_plan wp on (mw.planID = wp.planID) join muscle_group mg on (mg.muscle_group = mw.muscle_group) join exercise e on (e.exercise_name = mg.exercise_name) where wp.plan_type = 'loss';
   */
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
        echo "----------------------------------------------------<br>";
        echo "EXERCISE_NAME: ".$row['EXERCISE_NAME']."<br>".
        "Frequency: ".$row['FREQ']."<br>".
        "Exercise Equipment: ".$row['EXERCISE_EQUIPMENT']."<br>".
        "Exercise Time: ".$row['EXERCISE_TIME']."<br>";
        echo "----------------------------------------------------<br>";
    }
            }
        ?>
    </body>
</html>