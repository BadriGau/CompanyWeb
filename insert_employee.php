 <?php
 require_once "header.php";
 require_once "Connection.php";
$sus_msg=" ";
$exist=" ";
if(isset($_POST['submit'])){
  $emp_name = $_POST['emp_name'];
  $emp_phone = $_POST['emp_phone'];
  $emp_dep =$_POST['department'];
  echo $emp_dep;

  $check_query = "SELECT * FROM employee WHERE employee_name='$emp_name' LIMIT 1"; // Select rows.
  $result = mysqli_query($connection, $check_query); // Querys the database about the rows.
  $rows = mysqli_fetch_assoc($result); // Gives back a result wether exists or not.
  
  if ($rows) {
    if (strtolower($rows['employee_name']) === strtolower($emp_name)) {
      $exist ="Employee already exist";
    }
  }
  else{
    $sql = "INSERT INTO employee (employee_name,employee_phone,employee_department) VALUES('$emp_name','$emp_phone','$emp_dep')";
    if(mysqli_query($connection,$sql)){
      $sus_msg="data saved Successfully";
    }
    else{
      echo "something wrong";
    }
  }
}
 ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
              <P class="text-center font-weight-bold">Enter the details data for the Employee</P>
                   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="p-4 ">
                   <span class="alert-light text-success"><?php echo $sus_msg; ?></span>
                     <div class="form-group">
                      <label>Employee Name:</label>
                      <input type="text" class="form-control" name="emp_name" placeholder="Name......." required>
                      <span class="alert-light text-danger"><?php echo $exist; ?></span>
                     </div>
                     <div class="form-group">
                      <label>Employee Phone:</label>
                      <input type="text" class="form-control" name="emp_phone" placeholder="Phone......." required>
                      <span class="alert-light text-danger"><?php echo $exist; ?></span>
                     </div>
                     <div class="form-group">
                      <label>Employee Department:</label>
                      <select class="form-control" name="department">
                        <option selected>Choose...</option>
                        <?php
                        $sql= "select * from department";
                        $result = mysqli_query($connection, $sql);
                         while($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['department_id'].'">'.$rows['department_name'].'</option>';
                         }
                      ?>
                      </select>
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Save"> 
                  </form>
                </div>
            </div>
        </div>

<?php
 require_once "bottom.php";
 ?>