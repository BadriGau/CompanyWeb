<?php
setcookie("name","",time()-3600);
 
// Redirect to login page
header("location: Login.php");
exit;
?>