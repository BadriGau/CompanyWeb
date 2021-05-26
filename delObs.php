<?php
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
                 echo($id);
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