<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `contact_form` where id=$id";
        $conn->query($sql);
    }
    header('location: admin_contact.php');
    exit;
?>