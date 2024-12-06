<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Update | تعديل المنتج</title>
    <style>
        .id{
            display: none;
        }        
    </style>

</head>
<body>
    <?php 
    $ID = $_GET['id'];
    include("config.php");
    $up = mysqli_query($conn, "SELECT * FROM products WHERE ID =$ID");
    $data = mysqli_fetch_array($up);
    
    
    
    ?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المنتج</h2>
                <input type="text" name="id" class="id" value="<?php echo $data["ID"]; ?>">                
                <br>
                <input type="text" name="name"value="<?php echo $data["Name"]; ?>">
                <br>
                <input type="text" name="price" value="<?php echo $data["Price"]; ?>">
                <br>
                <input type="file" id="file" name="img" style="display: none;">
                <label for="file"> تعديل صورة المنتج</label>
                <button name="update" type="submit">تعديل المنتج</button>
                <br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <div>
            <p>Developped By DustVIX</p>
        </div>
    </center>

</body>
</html>