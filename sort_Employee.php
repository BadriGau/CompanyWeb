<?php
require_once "Connection.php";
$errDetails=" ";
?>
<div>
<h1 class="text-center">Equipment details related to Employee</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Equipment Ref</th>
      <th scope="col">Equipment Category</th>
      <th scope="col">Employee RequestBy</th>
      <th scope="col">Observation</th>
    </tr>
  </thead>
  <tbody>
  <?php
   $empId = $_POST["Employeee"];
    $count = 0;
  $sql="SELECT `equipment_reference`,`category_name`,`employee_name`,`observation_content` from equipment JOIN category on equipment.equipment_category = category.category_id JOIN observation on equipment.equipment_id = observation.observation_equipment JOIN employee on equipment.equipment_employee = employee.employee_id WHERE equipment_employee = $empId";
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
  else{
      $errDetails = "There are nothing requested by this employee";
  }
  ?>
  </tbody>
</table>
<span class="alert-light text-primary"><?php echo $errDetails; ?></span>
</div>
