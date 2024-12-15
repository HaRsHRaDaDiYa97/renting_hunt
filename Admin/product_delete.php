<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `detail` where id=$id";
        $conn->query($sql);
    }
    header('location: admin_product.php');
    exit;
?>