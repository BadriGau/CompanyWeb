<?php
require_once "header.php";
require_once "Connection.php";
?>
<!--Equipment Catagory-->
<div>
<h1 class="text-center">Equipment Catagory</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "Select * from category";
  $result = $connection -> query($sql);
  $count=0;
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
      <tr>
      <th scope="row"><?php echo($count);?></th>
      <td>
        <a class="categoryN" value="<?php echo($row['category_id']);?>"><?php echo($row["category_name"]);?></a>
      </td>
    </tr>
    <?php
    }
  }
  ?>
  </tbody>
</table>
</div>
<div id="Category"></div>

<?php
require_once "bottom.php";
?>