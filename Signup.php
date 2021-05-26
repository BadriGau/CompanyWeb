<?php
// Include config file
require_once "Connection.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT dbuser_id FROM dbuser WHERE dbuser_name = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["Password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["Password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["ConPassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["ConPassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO dbuser (dbuser_name, dbuser_password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            //echo("<script>alert($username) </script>");
            $param_password = md5($password); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: Login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="bootstraps/css/bootstrap.min.css"/>
        <title>SignUp Page</title>
    </head>
    <body style=" background-image: url('bg2.jpg'); background-repeat: no-repeat; background-size: 100%;">
            <nav class="navbar navbar-dark bg-dark">
                <div> </div>    
            </nav> -->
<!--SignUp form-->

        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-dark p-3">SignUp</h3>
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="p-4 ">
                     <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                <input type="text" class="form-control"  name ="username"  placeholder="Create username............" required>
             </div>
          <div class="form-group">
          <label>password</label>
           <input type="password" class="form-control"  placeholder =" create password..........."    name="Password" required>
           <span class="alert-light text-primary"><?php echo $password_err; ?></span>
           </div>
           <div class="form-group">
            <label>Verify password</label>
             <input type="password" class="form-control"  placeholder ="Verify password..........."    name="ConPassword" required>
             <span class="alert-light text-danger"><?php echo $confirm_password_err; ?></span>
             </div>
           
            <input type="submit" class="form-control btn btn-success" name="submit" value="Submit"> 
                <p>I already have Account <a href="Index.html">go to Login Page</a></p>         
            </div>
                  </form>
                </div>
            </div>
        </div>

    </body>
</html>