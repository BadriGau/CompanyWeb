<?php
require_once "header.php";
require_once "Connection.php";
$sus_msg=" ";
$exist=" ";
$problem=" ";
if(isset($_POST['submit'])){
  $ref = $_POST['eqm_ref'];
  $cate = $_POST['category'];
  $emp =$_POST['employee'];

  $check_query = "SELECT * FROM equipment WHERE equipment_reference='$ref' LIMIT 1"; // Select rows.
  $result = mysqli_query($connection, $check_query); // Querys the database about the rows.
  $rows = mysqli_fetch_assoc($result); // Gives back a result wether exists or not.
  
  if ($rows) {
    if ($rows['equipment_reference'] === $ref) {
      $exist ="Equipment reference already exist";
    }
  }
  else{
    $sql = "INSERT INTO equipment (equipment_reference,equipment_category,equipment_employee) VALUES('$ref','$cate','$emp')";
    if(mysqli_query($connection,$sql)){
      $sus_msg="Data saved Successfully";
    }
    else{
      $problem= "something wrong";
    }
  }
}
?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
              <P class="text-center font-weight-bold">Enter the details for the Equipments</P>
                   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="p-4 ">
                   <span class="alert-light text-success text-center"><?php echo $sus_msg; ?></span>
                     <div class="form-group">
                      <label>Equipment Reference:</label>
                      <input type="text" class="form-control" name="eqm_ref" placeholder="Reference......." required>
                      <span class="alert-light text-primary"><?php echo $exist; ?></span>
                     </div>
                     <div class="form-group">
                      <label>Equipment Category:</label>
                      <select class="form-control" name="category">
                      <option selected>Choose...</option>
                      <?php
                        $sql= "select * from category";
                        $result = mysqli_query($connection, $sql);
                         while($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['category_id'].'">'.$rows['category_name'].'</option>';
                         }
                      ?>
                      </select>
                     </div>
                     <div class="form-group">
                      <label>Employee who order Equipment:</label>
                      <select class="form-control" name="employee">
                        <option selected>Choose...</option>
                        <?php
                        $sql= "select * from employee";
                        $result = mysqli_query($connection, $sql);
                         while($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['employee_id'].'">'.$rows['employee_name'].'</option>';
                         }
                      ?>
                      </select>
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Save"> 
                     <span class="alert-light text-danger text-center"><?php echo $problem; ?></span>
                  </form>
                </div>
            </div>
        </div>
<?php
require_once "bottom.php";
?>