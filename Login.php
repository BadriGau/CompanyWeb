<?php
 
// Check if the user is already logged in, if yes then redirect him to another page
if(isset($_COOKIE["name"])){
    header("location: GlobalList.php");
    exit;
}
 
// Include config file
require_once "Connection.php";
 
// Define variables and initialize with empty values
$username = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter your password.";
    } else{
        $pwd = md5(trim($_POST["Password"]));
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT dbuser_id, dbuser_name, dbuser_password FROM dbuser WHERE dbuser_name = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password);
                    if(mysqli_stmt_fetch($stmt)){
                        echo($pwd);
                        if($pwd == $password){
                            // Password is correct, so set the cookie
                             setcookie("name",$username,time()+3600);
                            // Redirect user to welcome page
                            header("location: GlobalList.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstraps/css/bootstrap.min.css"/>
</head>
<body style=" background-image: url('bg2.jpg'); background-repeat: no-repeat; background-size: 100%;">
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 bg-light mt-5 px-0">
      <h3 class="text-center text-light bg-dark p-3">Login</h3>
        <p class="text-center">Please fill in your credentials to login.</p>
        <form class="p-4 " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="alert-light text-primary"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Enter Password.....">
                <span class="alert-light text-danger"><?php echo $password_err; ?></span>
            </div>
            <input type="submit" class="form-control btn btn-success" name="submit" value="Submit">
            <p>I don't have Account <a href="Signup.php">Create Account</a></p> 
        </form>
       </div> 
    </div>
  </div>    
</body>
</html>