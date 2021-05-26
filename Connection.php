<?php
$connection = mysqli_connect('localhost', 'root', '','xyz');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

?>