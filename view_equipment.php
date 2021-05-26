<?php
require_once "header.php";
require_once "Connection.php";
?>
<!--Equipments-->
<div>
<h1 class="text-center">Equipments</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">References</th>
      <th scope="col">Catagory Name</th>
      <th scope="col">Request Person</th>
      <th scope="col">Observations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 0;
  $sql="SELECT `equipment_id`,`equipment_reference`,`category_name`,`employee_name`,`observation_content` FROM equipment,category,employee,observation WHERE `equipment_category` = `category_id` AND `equipment_employee` = `employee_id` AND `observation_equipment` = `equipment_id`";
  $result = $connection -> query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
      <tr>
      <th scope="row"><?php echo($count);?></th>
      <td><?php echo($row["equipment_reference"]);?></td>
      <td><?php echo($row["category_name"]);?></td>
      <td><?php echo($row["employee_name"]);?></td>
      <td><?php echo($row["observation_content"]);?></td>
    </tr>
    <?php
    }
  }
  ?>
  </tbody>
</table>
</div>

<?php
require_once "bottom.php";
?>