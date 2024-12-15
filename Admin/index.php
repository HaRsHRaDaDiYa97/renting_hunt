<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();

}

?>




<?php 
include 'header.php';
?>


<?php 
include 'userdata.php';
?>