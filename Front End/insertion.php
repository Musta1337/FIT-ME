<html>

<head>
<title>Database connection.</title>
</head>

<body>
<?php  // creating a database connection 

    if(empty($_POST["Emp_Name"]))
    {
        echo "<h1>Enter Records of the Employee</h1>";
        echo "<form action='insertion.php' method='post'>";
        echo "<label for='Emp_Name'>Emp_Name : </label>";
        echo "<input type='text' id='Emp_Name' name='Emp_Name'>";
        echo "<label for='Emp_Num'>Emp_Num : </label>";
        echo "<input type='text' id='Emp_Num' name='Emp_Num'>";
        echo "<br>";
        echo "<label for='Job_Title'>Job____Title:</label>";
        echo "<input type='text' id='Job_Title' name='Job_Title'>";
        echo "<label for='Manager_ID'>ManagerID : </label>";
        echo "<input type='text' id='Manager_ID' name='Manager_ID'>";
        echo "<br>";
        echo "<label for='Hire_Date'>HIREDATE : </label>";
        echo "<input type='text' id='Hire_Date' name='Hire_Date'>";
        echo "<label for='Salary'>Salary___ : </label>";
        echo "<input type='text' id='Salary' name='Salary'>";
        echo "<br>";
        echo "<label for='Commission'>Commission : </label>";
        echo "<input type='text' id='Commission' name='Commission'>";
        echo "<label for='Dept_No'>Dept_No__:</label>";
        echo "<input type='text' id='Dept_No' name='Dept_No'>";
        echo "<br>";
        echo "<input type='submit' value='Save to Database'>";
        echo "</form>";
    }        
    else 
    {
        $db_sid = 
        "(DESCRIPTION =
         (ADDRESS = (PROTOCOL = TCP)(HOST = MUSTA-PC.mshome.net)(PORT = 1521))
         (CONNECT_DATA =
           (SERVER = DEDICATED)
           (SERVICE_NAME = test)
         )
       )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
       
        $db_user = "scott";   // Oracle username e.g "scott"
        $db_pass = "musta123";    // Password for user e.g "1234"
        $con = oci_connect($db_user,$db_pass,$db_sid); 
        if($con) 
           { echo "Oracle Connection Successful."; } 
        else 
           { die('Could not connect to Oracle: '); } 
           
     
          $q = "insert into employees (last_name, employee_id, job_id, manager_id, hire_date, salary, Commission_pct, department_id) values ('"
          .$_POST["Emp_Name"]."', '".$_POST["Emp_Num"]."', '".$_POST["Job_Title"]."', '".$_POST["Manager_ID"]."', to_date('".$_POST["Hire_Date"]."', 'DD-MM-YYYY'), '"
          .$_POST["Salary"]."', '".$_POST["Commission"]."', '".$_POST["Dept_No"]."')";
          $q_id = oci_parse($con, $q); 		
          $r = oci_execute($q_id); 
          echo "Employees table must have an entry for email, but the code works fine.";
          
    }

?>

</body>
</html>