<html>

<head>
<title>Database connection.</title>
</head>

<body>
<?php  // creating a database connection 

    if(empty($_POST["Emp_Search"]) && empty($_POST["Update"]))
    {
        echo "<form action='update.php' method='post'>";
        echo "<label for='Emp_Search'>Enter Employee Number : </label>";
        echo "<input type='text' id='Emp_Search' name='Emp_Search'>";
        echo "<input type='submit' name='search' value='Search the Record'>";


        echo "<h1>Enter Records of the Employee</h1>";
        echo "<form action='update.php' method='post'>";
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
        if(empty($_POST["Update"]))
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
            
        
            $q = "select * from employees where employee_id='".$_POST["Emp_Search"]."'";
            $query_id = oci_parse($con, $q); 		
            $r = oci_execute($query_id); 

            $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
            echo "<br>";
            echo "<label for='Emp_Search'>Enter Employee Number : </label>";
            echo "<input type='text' id='Emp_Search' name='Emp_Search' value='".$_POST["Emp_Search"]."'>";

            echo "<h1>Enter Records of the Employee</h1>";
            echo "<form action='update.php' method='post'>";
            echo "<label for='Emp_Name'>Emp_Name : </label>";
            echo "<input type='text' id='Emp_Name' name='Emp_Name' value='".$row['LAST_NAME']."'>";
            echo "<label for='Emp_Num'>Emp_Num : </label>";
            echo "<input type='text' id='Emp_Num' name='Emp_Num' value='".$row['EMPLOYEE_ID']."'>";
            echo "<br>";
            echo "<label for='Job_Title'>Job____Title:</label>";
            echo "<input type='text' id='Job_Title' name='Job_Title' value='".$row['JOB_ID']."'>";
            echo "<label for='Manager_ID'>ManagerID : </label>";
            echo "<input type='text' id='Manager_ID' name='Manager_ID' value='".$row['MANAGER_ID']."'>";
            echo "<br>";
            echo "<label for='Hire_Date'>HIREDATE : </label>";
            echo "<input type='text' id='Hire_Date' name='Hire_Date' value='".$row['HIRE_DATE']."'>";
            echo "<label for='Salary'>Salary___ : </label>";
            echo "<input type='text' id='Salary' name='Salary' value='".$row['SALARY']."'>";
            echo "<br>";
            echo "<label for='Commission'>Commission : </label>";
            echo "<input type='text' id='Commission' name='Commission' value='".$row['COMMISSION_PCT']."'>";
            echo "<label for='Dept_No'>Dept_No__:</label>";
            echo "<input type='text' id='Dept_No' name='Dept_No' value='".$row['DEPARTMENT_ID']."'>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<label for='Emp_Search'>Enter Employee Number : </label>";
            echo "<input type='text' id='Emp_Search' name='Emp_Search' value='".$_POST["Emp_Search"]."'>";
            echo "<input type='submit' value='Save to Database' name='Update'>";
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
            
            $q = "UPDATE employees ".
            "SET LAST_NAME='".$_POST["Emp_Name"]."', EMPLOYEE_ID='".$_POST["Emp_Num"]."', JOB_ID='".$_POST["Job_Title"]."', ".
            "MANAGER_ID='".$_POST["Manager_ID"]."', SALARY='".$_POST["Salary"]."', COMMISSION_PCT='".$_POST["Commission"]."', ".
            "DEPARTMENT_ID='".$_POST["Dept_No"]."' where employee_id='".$_POST["Emp_Search"]."'";
            $query_id = oci_parse($con, $q); 		
            $r = oci_execute($query_id);
            echo "Data Updated";
          }
    }

?>

</body>
</html>