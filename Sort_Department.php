<?php
require_once "Connection.php";
?>
<div>
<h1 class="text-center">Employee Details</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Employee Phone</th>
      <th scope="col">Department Name</th>
    </tr>
  </thead>
  <tbody>
  <?php
   $depid = $_POST["department"];
    $count = 0;
  $sql="SELECT `employee_name`,`employee_phone`,`department_name` FROM employee JOIN department on employee.employee_department = department.department_id where `employee_department` = $depid ";
  $result = $connection -> query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
      <tr>
      <th scope="row"><?php echo($count);?></th>
      <td><?php echo($row["employee_name"]);?></td>
      <td><?php echo($row["employee_phone"]);?></td>
      <td><?php echo($row["department_name"]);?></td>
    </tr>
    <?php
    }
  }
  else{
     echo("<span>There are no more details about this department</span>");
  }
  ?>
  </tbody>
</table>
</div>