<?php 
include("config.php");

if(isset($_POST['upload'])){
    $Name  = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['img'];
    $image_location = $_FILES['img']['tmp_name'];
    $image_name     = $_FILES['img']['name'];
    $image_up       = "iamges/".$image_name;

    $insert = "INSERT INTO products (Name, Price , Image) VALUES ('$Name' , '$Price' , '$image_up')";
    mysqli_query($conn , $insert);
    if(move_uploaded_file($image_location, $image_up )){
        echo '<script>alert("تم رفع المنتج") </script>';

    }else{
        echo '<script>alert("نمت") </script>';
    };
    header('location: index.php');

};
?>