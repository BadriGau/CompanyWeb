<?php
require_once "header.php";
require_once "Connection.php";
$sus_msg=" ";
if(isset($_POST['submit'])){
  $eq_ref = $_POST['equipment'];
  $content = $_POST['ob_content'];
  
    $sql = "INSERT INTO observation (observation_equipment,observation_content) VALUES('$eq_ref','$content')";
    if(mysqli_query($connection,$sql)){
      $sus_msg="Data saved Successfully";
    }
    else{
      $sus_msg="something wrong";
    }
}
?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
              <P class="text-center font-weight-bold">Enter the details for the Observation</P>
                   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="p-4 ">
                   <span class="alert-light text-success text-center"><?php echo $sus_msg; ?></span>
                     <div class="form-group">
                      <label>Observation Equipment:</label>
                      <select class="form-control" name="equipment">
                        <option selected>Choose...</option>
                        <?php
                        $sql= "select * from equipment";
                        $result = mysqli_query($connection, $sql);
                         while($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['equipment_id'].'">'.$rows['equipment_reference'].'</option>';
                         }
                      ?>
                      </select>
                     </div>
                     <div class="form-group">
                      <label>Observation Content:</label>
                      <input type="text" class="form-control" name="ob_content" placeholder="observation content....">
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Save"> 
                  </form>
                </div>
            </div>
        </div>
<?php
require_once "bottom.php";
?>