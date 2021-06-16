<html>
    <body>
    <h1>Report for diet plan</h1>
        <form action="Diet_PlanReport.php" method="post">
            <label for="diet_weeks">Choose you Diet Option:</label>
            <br>
            <select name="diet_weeks" id="diet_weeks">
                <option value="0">Daily</option>
                <option value="1">Weekly</option>
                <option value="4">Monthly</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
        <?php  // creating a database connection 
        if(isset($_POST["diet_weeks"]))
        {
            $db_sid = "(DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-UAQMM7R)(PORT = 1521))
            (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = iqra)
            ))";// Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN)
            $db_user = "scott";   // Oracle username e.g "scott"
            $db_pass = "1234";    // Password for user e.g "1234"
            $con = oci_connect($db_user,$db_pass,$db_sid); 
            if($con) 
                { echo "Oracle Connection Successful."; } 
            else 
                { die('Could not connect to Oracle: '); } 
                $q = $q = "select * from diet_plan where diet_weeks=".$_POST["diet_weeks"].";
                $query_id = oci_parse($con, $q); 		
                $r = oci_execute($query_id);
                echo"<hr>";
                echo"<br>";
                echo"Following Information is found: ";
                echo"<br>"
                while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                { 
                   echo "----------------------------------------------------<br>";
                   echo "Diet ID: ".$row['diet_id']."<br>"."Diet Name: ".$row['diet_name']."<br>"."Diet Type: ".$row['diet_type']."<br>";
                   echo "----------------------------------------------------<br>";
                }
        }    
    ?>
        </body>
</html>
   