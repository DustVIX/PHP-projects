<?php 
    include("config.php");
    $ID = $_GET['id'];
    mysqli_query($conn, "DELETE FROM products WHERE ID =$ID");
    header('location: products.php');
?>