
<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Fit me</title>
    <link rel="stylesheet" href="FrontStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
</head>
<body>
    <div class="menu">
        <h1 class=logo>Fit<span>Me</span></h1>
        <ul>
            <li><a href="About.html">About</li>
            <li><a href="#">Froms<i class="fas fa-caret-down"></i></a>
                <div class="dropdown">
                    <ul>
                        <li><a href="login.php">Log In</li>
                        <li><a href="Log.php">Log Today Progress</li>
                        <li><a href="CreateWorkoutPlan.php">Create Workout Plan</li>  
                    </ul>
                </div>
            </li>
             <li><a href="#">Report<i class="fas fa-caret-down"></i></a>
             <div class="dropdown">
                <ul>
                    <li><a href="diet.php">Diet plan</li>
                    <li><a href="exercise.php">exercise type based on fitness goal</li>
                    <li><a href="personalize.php">Create a personalize plan</li>  
                </ul>
            </div>
        </li>
        <li><a href="Contact.html">Contact</a></li> 
        <form action="search.php" method="POST">
             <div class="Search">
             <input type="text" name="box" placeholder="Search Anything you want....">
             </div>
        </form>
        </ul>

    </div>
     
</body>
