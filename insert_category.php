<?php
require_once "header.php";
require_once "Connection.php";
$sus_msg=" ";
$exist=" ";
if(isset($_POST['submit'])){
  $cat_name = $_POST['cat_name'];
  $check_query = "SELECT * FROM category WHERE category_name='$cat_name' LIMIT 1"; // Select rows.
  $result = mysqli_query($connection, $check_query); // Querys the database about the rows.
  $rows = mysqli_fetch_assoc($result); // Gives back a result wether exists or not.
  
  if ($rows) {
    if (strtolower($rows['category_name']) === strtolower($cat_name)) {
      $exist ="Category already exist";
    }
  }
  else{
    $sql = "INSERT INTO category (category_name) VALUES('$cat_name')";
    if(mysqli_query($connection,$sql)){
      $sus_msg="data savedSuccessfully";
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
              <P class="text-center font-weight-bold">Enter the data for the Category</P>
                   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="p-4 ">
                   <span class="alert-light text-success"><?php echo $sus_msg; ?></span>
                     <div class="form-group">
                      <label>Category Name:</label>
                      <input type="text" class="form-control" name="cat_name" placeholder="Category.....">
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
