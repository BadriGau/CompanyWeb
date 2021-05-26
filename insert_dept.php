<?php
require_once "header.php";
require_once "Connection.php";
$sus_msg=" ";
$exist=" ";
if(isset($_POST['submit'])){
  $dep_name = $_POST['dep_name'];
  $check_query = "SELECT * FROM department WHERE department_name='$dep_name' LIMIT 1"; // Select rows.
  $result = mysqli_query($connection, $check_query); // Querys the database about the rows.
  $de_name = mysqli_fetch_assoc($result); // Gives back a result wether exists or not.
  
  if ($de_name) {
    if ($de_name['department_name'] === $dep_name) {
      $exist ="Department already exist";
    }
  }
  else{
    $sql = "INSERT INTO department (department_name) VALUES('$dep_name')";
    if(mysqli_query($connection,$sql)){
      $sus_msg="data savedSuccessfully";
    }
    else{
      echo "something wrong";
    }
  }
}
?>

<div class="container" id="Insert_depart">
    <div class="row justify-content-center">
      <div class="col-lg-5 bg-light mt-5 px-0">
        <P class="text-center font-weight-bold">Enter the data for the department</P>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="p-4 ">
             <span class="alert-light text-success"><?php echo $sus_msg; ?></span>
               <div class="form-group">
                <label>Department Name</label>
                <input type="text" class="form-control" name="dep_name" placeholder="Department Name">
                <span class="alert-light text-danger"><?php echo $exist; ?></span>
               </div>
               <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Save"> 
            </form>
          </div>
      </div>
  </div>
  <?php
  require_once "bottom.php";
  ?>