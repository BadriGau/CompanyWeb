<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_COOKIE["name"])){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
        
        <link rel="stylesheet" href="bootstraps/css/bootstrap.min.css"/>
        
        
        
        <title>Login Page</title>
    </head>
    <!--Head nav bar include the login and some other nav items-->
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="GlobalList.php">Menu</a>
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    View Data
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="view_department.php">Departments</a>
                   <a class="dropdown-item" href="view_employee.php">Employee</a>
                   <a class="dropdown-item" href="view_category.php">Equipment Catagories</a>
                   <a class="dropdown-item" href="view_equipment.php">Equipment</a>
                   <a class="dropdown-item" href="view_observations.php">Observations</a>
                 </div>
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Insert
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="insert_dept.php">Departments</a>
                   <a class="dropdown-item" href="insert_category.php">Equipment Catagories</a>
                   <a class="dropdown-item" href="insert_employee.php">Employee</a>
                   <a class="dropdown-item" href="insert_equipment.php">Equipment</a>
                   <a class="dropdown-item" href="insert_observation.php">Observation</a>
                 </div>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="LogOut.php"><button type="button" class="btn btn-outline-danger">Logout</button></a>
                </li>
              </ul>
            </div>
        </nav>
        