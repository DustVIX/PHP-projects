<?php 
include('config.php');

if(isset($_POST['add'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $insert = "INSERT INTO addcard (Name, Price) VALUES ('$NAME', '$PRICE')";
    mysqli_query($conn,$insert);
    header('location: card.php');
};
?>