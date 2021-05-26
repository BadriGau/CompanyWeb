<?php
require_once "header.php";
require_once "Connection.php";
?>
<!--Employees-->
<div>
<h1 class="text-center">Employees</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Telephone</th>
      <th scope="col">Department</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT `employee_id`,`employee_name`,`employee_phone`,`department_name` FROM employee,department WHERE `employee_department` = `department_id`;";
  $result = $connection -> query($sql);
  $count = 0;
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
    <tr>
      <th scope="row"><?php echo $count;?></th>
      <td>
        <a class="empId" value="<?php echo $row['employee_id'];?>"><?php echo($row["employee_name"]);?></a>  
      </td>
      <td><?php echo($row["employee_phone"]);?></td>
      <td><?php echo($row["department_name"]);?></td>
    </tr>
    <?php
    }
  }
  ?>
  </tbody>
</table>
</div>
<div id="SortEq"></div>
<?php
require_once "bottom.php";
?>