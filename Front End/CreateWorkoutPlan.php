<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create_Workout_Plan</title>
    <link rel="stylesheet" href="CreateWorkoutPlan.css">
</head>
<body>
    <form>
        <h1>Create Workout Plan</h1>
        <p>Please Fill this form to Create your Own Workout Plan.</p>
        <p>Scoll down and set your workout plan for 5 days</p>
        
        <label for="Gender">Enter Your Gender:</label>
        <input type="text" id=Gender name="Gender" placeholder="@Enter your Gender(e.g. Male,Female)">
        <label for="Age">Enter Your Age:</label>
        <input type="text" id=Age name="Age" placeholder="@Enter Your Age">
        <label for="BMI">Enter your BMI:</label>
        <input type="text" id=BMI name="BMI" placeholder="@Enter Your BMI">
        <label for="name">Enter your workout name:</label>
        <input type="text" id=name name="name" placeholder="@Enter Your workout name">
        <label for="type">Enter your plan type:</label>
        <input type="text" id=type name="type" placeholder="@Enter Your plan type">
        
        <br><br>
        <p>----------------------------------------------------------------------------------------</p>
        <br><br>
        Day:
        <select name="Day" id="day1">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        Muscle Group:
        <select name="Muscle_group" id="Muscle_group1">
        <option value="legs">Legs</option>
        <option value="biseps">Biseps</option>
        <option value="chest">chest</option>
        <option value="thights">Thights</option>
        <option value="triceps">Triceps</option>
        <option value="shoulders">Shoulders</option>
        </select>
        <br><br>
        <label>Enter your Workout Time</label>
        <input type="text" id=WorkoutTime1 name="WorkoutTime" placeholder="@Enter Your Workout Time ">
        <br><br>
        <p>----------------------------------------------------------------------------------------</p>
        <br><br>
        Day:
        <select name="Day" id="day2">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        Muscle Group:
        <select name="Muscle_group" id="Muscle_group2">
        <option value="legs">Legs</option>
        <option value="biseps">Biseps</option>
        <option value="chest">chest</option>
        <option value="thighs">Thights</option>
        <option value="triceps">Triceps</option>
        <option value="shoulders">Shoulders</option>
        </select>
        <br><br>
        <label>Enter your Workout Time</label>
        <input type="text" id=WorkoutTime2 name="WorkoutTime" placeholder="@Enter Your Workout Time ">
        <br><br>
        <p>----------------------------------------------------------------------------------------</p>
        <br><br>

        Day:
        <select name="Day" id="day3">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        Muscle Group:
        <select name="Muscle_group" id="Muscle_group3">
        <option value="legs">Legs</option>
        <option value="biseps">Biseps</option>
        <option value="chest">chest</option>
        <option value="thighs">Thights</option>
        <option value="triceps">Triceps</option>
        <option value="shoulders">Shoulders</option>
        </select>
        <br><br>
        <label>Enter your Workout Time</label>
        <input type="text" id=WorkoutTime3 name="WorkoutTime" placeholder="@Enter Your Workout Time ">
        <br><br>
        <p>----------------------------------------------------------------------------------------</p>
        <br>
        <br>
        Day:
        <select name="Day" id="day4">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        Muscle Group:
        <select name="Muscle_group" id="Muscle_group4">
        <option value="legs">Legs</option>
        <option value="biseps">Biseps</option>
        <option value="chest">chest</option>
        <option value="thighs">Thights</option>
        <option value="triceps">Triceps</option>
        <option value="shoulders">Shoulders</option>
        </select>
        <br><br>
        <label>Enter your Workout Time</label>
        <input type="text" id=WorkoutTime4 name="WorkoutTime" placeholder="@Enter Your Workout Time ">
        <br><br>
        <p>----------------------------------------------------------------------------------------</p>
        <br><br>
        Day:
        <select name="Day" id="day5">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        Muscle Group:
        <select name="Muscle_group" id="Muscle_group5">
        <option value="legs">Legs</option>
        <option value="biseps">Biseps</option>
        <option value="chest">chest</option>
        <option value="thighs">Thights</option>
        <option value="triceps">Triceps</option>
        <option value="shoulders">Shoulders</option>
        </select>
        <br><br>
        <label>Enter your Workout Time</label>
        <input type="text" id=WorkoutTime5 name="WorkoutTime" placeholder="@Enter Your Workout Time ">
        <br>
        <button type="submit">save My workout Plan</button>
    </form>
    <?php
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

   $q = "Insert into workout_plan(workout_name, diet_id, Age, gender, plan_type, BMI) VALUES ('".$_POST['name']."', 1, ".$_POST['Age'].", '".$_POST['Gender']."', '".$_POST['type']."' , ".$_POST['type'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   
   $q = "select planID from workout_plan where workout_name = '".$_POST['name']."'";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);

   $q = "insert into muscle_workout VALUES(".$row['PLANID'].", '".$_POST['Muscle_group1']."', ".$_POST['day1'].", ".$_POST['WorkoutTime1'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   
   $q = "insert into muscle_workout VALUES(".$row['PLANID'].", '".$_POST['Muscle_group2']."', ".$_POST['day2'].", ".$_POST['WorkoutTime2'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   
   $q = "insert into muscle_workout VALUES(".$row['PLANID'].", '".$_POST['Muscle_group3']."', ".$_POST['day3'].", ".$_POST['WorkoutTime3'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   
   $q = "insert into muscle_workout VALUES(".$row['PLANID'].", '".$_POST['Muscle_group4']."', ".$_POST['day4'].", ".$_POST['WorkoutTime4'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   
   $q = "insert into muscle_workout VALUES(".$row['PLANID'].", '".$_POST['Muscle_group5']."', ".$_POST['day5'].", ".$_POST['WorkoutTime5'].")";
   
   $query_id = oci_parse($con, $q); 		
   $r = oci_execute($query_id);
   

            }
    ?>
</body>