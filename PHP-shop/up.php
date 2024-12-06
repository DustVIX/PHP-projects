<?php 
include("config.php");

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $Name  = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['img'];
    $image_location = $_FILES['img']['tmp_name'];
    $image_name     = $_FILES['img']['name'];
    $image_up       = "iamges/".$image_name;

    // $update = "INSERT INTO products (Name, Price , Image) VALUES ('$Name' , '$Price' , '$image_up')";
    $update = "UPDATE products SET Name='$Name' , Price='$Price', Image='$image_up' WHERE ID=$ID";
    mysqli_query($conn , $update);
    if(move_uploaded_file($image_location, $image_up )){
        echo '<script>alert("تم تحديث المنتج") </script>';

    }else{
        echo '<script>alert("نمت") </script>';
    };
    header('location: products.php');

};
?>