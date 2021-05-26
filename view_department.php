<?php
require_once "header.php";
require_once "Connection.php";
?>
<!--Equipments-->
<!--<script>
  //require_once ('Validation.js');
  </script> -->
  
<div>
<h1 class="text-center">Departments</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Department</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 0;
  $sql="SELECT `department_id`,`department_name` FROM department";
  $result = $connection -> query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
      <tr>
      <th scope="row"><?php echo($count);?></th>
      <td>
        <a class="dept" value="<?php echo $row['department_id'];?>"><?php echo($row["department_name"]);?></a>
        
      </td>
    </tr>
    <?php
    }
  }
  ?>
  </tbody>
</table>
</div>
<div id="sortTab"></div>


<!--<script type="text/javascript" src="Validation.js"></script> -->

<?php
require_once "bottom.php";
?>