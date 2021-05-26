<?php
require_once "header.php";
require_once "Connection.php";

$err_msg =" ";

if(!empty($_GET['action'])){
    $action =$_GET['action'];
    
    switch($action){
        case 'deleteObservation':
            if(empty($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 1) {
                die();
                 }
                 $id = $_GET['id'];
                 $delSql = "delete from observation where observation_id = $id";
               $conf = mysqli_query($connection,$delSql);
               if(!$conf){
                   $err_msg = "Something wrong";

               }
               else{
                   header('Location:view_observations.php');
               }
    }
}

?>
<!--Equipments-->
<script>
 function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x){
      return true;
  }
  else{
    return false;
  }
}
</script>
<div>
<h1 class="text-center">Equipments with Observation Purpose</h1>
          <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Equipment References</th>
      <th scope="col">Observation_Reason</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 0;
  $sql="SELECT `observation_id`,`observation_equipment`,`observation_content` FROM observation";
  $result = $connection -> query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $count++;
      ?>
      <tr>
      <th scope="row"><?php echo($count);?></th>
      <td><?php echo($row["observation_equipment"]);?></td>
      <td><?php echo($row["observation_content"]);?></td>
      <td>
      <a href="delObs.php?action=deleteObservation&id=<?php echo($row['observation_id']);?>" onclick=" return ConfirmDelete();" class="btn btn-danger">Delete</a>
      <span class="alert-light text-primary"><?php echo $err_msg; ?></span>
      </td>
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