<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Find Diet Plan</title>
        <link rel="stylesheet" href="plan.css">
    </head>
    <body>
        <form action="personalize.php" method="post">
            <h1>Please fill the following form to make a personalized plan.</h1>
            <p>Please enter the BMI, AGE AND GENDER for which you want to personalize plan.</p>
            <label for="bmi">BMI</label>
            <input type="text" id=bmi name="bmi" placeholder="Please enter BMI.">
            <label for="age">Age</label>
            <input type="text" id=age name="age" placeholder="Please enter the age.">
            <label for="gender">Gender</label>
            <input type="text" id=gender name="gender" placeholder="Please enter the gender">
            <label for="type">Fitness Type</label>
            <input type="text" id=type name="type" placeholder="Please enter the fitness type">
            <button type="submit">Create Plan</button>
        </form>
        <?php  // creating a database connection 
    if(isset($_POST["bmi"]) && isset($_POST["age"]) && isset($_POST["gender"]))
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

   $q = "select * from workout_plan where (age > ".$_POST['age']." - 5 AND age < ".$_POST['age']." + 5) AND (gender = '".$_POST['gender']."') AND (plan_type like '%".$_POST['type']."%') AND (BMI > ".$_POST['bmi']." - 5 and BMI < ".$_POST['bmi']." + 5)";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   echo "Your Personalized Workout plan found for you.<br>";
    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
        echo "----------------------------------------------------<br>";
        echo "Plan ID: ".$row['PLANID']."<br>".
        "Workout Name: ".$row['WORKOUT_NAME']."<br>".
        "Diet ID: ".$row['DIET_ID']."<br>".
        "Age: ".$row['AGE']."<br>".
        "Gender: ".$row['GENDER']."<br>".
        "Type of Plan: ".$row['PLAN_TYPE']."<br>".
        "BMI: ".$row['BMI']."<br>";
        echo "----------------------------------------------------<br>";
    }
    echo "".$_SESSION['member_id']."";
    $q1 = "update member set planid = ".$row['PLANID']." where member_name = '".$_SESSION['member_id']."'";
   
    $query_id1 = oci_parse($con, $q1); 		
    $r1 = oci_execute($query_id1);

    echo "Now displaying the Muscle Group: ";
    $q = "select * from muscle_workout where planID = '".$row['PLANID']."'";
   
    $query_id = oci_parse($con, $q); 		
    $r = oci_execute($query_id);
    echo "Your Personalized Workout plan found for you.<br>";
     while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) {
         echo "----------------------------------------------------<br>";
            echo "Muscle Group: ".$row['MUSCLE_GROUP']."<br>".
            "Day : ".$row['DAY']."<br>".
            "workout time: ".$row['WORKOUT_TIME']."<br>";       
         echo "----------------------------------------------------<br>";
     }    

            }
        ?>
    </body>
</html>