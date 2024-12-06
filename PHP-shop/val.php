<?php
include("config.php");

$ID = $_GET['id'];
$up = mysqli_query($conn, "SELECT * FROM products WHERE ID=$ID");
$data = mysqli_fetch_array($up);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <title>تاكيد الشراء المنتج</title>
    <style>
        input{
            display: none;
        }
        .main{
            width: 30%;
            padding: 20px;
            box-shadow: 1px 1px 10px silver;
            margin-top: 50px;
        }

    </style>
</head>
</head>

<body>
    <center>
        <form action="insert_card.php" method="post">
        <div class="main">
            <h2>هل انت فعلا تريد شراء المنتج؟</h2>
            <input type="text" name="id" value="<?php echo $data['ID']; ?>">
            <input type="text" name="name" value="<?php echo $data['Name']; ?>">
            <input type="text" name="price" value="<?php echo $data['Price']; ?>">
            <button name="add" type="submit" class="btn btn-warning">تاكيد</button>
            <br>
            <a href="shop.php">الرجوع لصفحة المنتجات</a>
        </div>    



        </form>
    </center>


    <script src="src/js/bootstrap.min.js"></script>
</body>

</html>