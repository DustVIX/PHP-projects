<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <title>Shop online | المنتجات</title>
    <style>
        h3{
            font-family: "Tajawal", serif;
            font-weight: 700;

        }
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            width: 60%;
        }

    </style>
</head>
<body>
    <center>
        <h3>لوحة التحكم الادمن</h3>
    </center>
    <?php
    include('config.php');
    $result = mysqli_query($conn, "SELECT * FROM products");
    while ($row = mysqli_fetch_array($result)) {
        echo "
            <center>

                <main>
                    <div class='card' style='width: 18rem;'>
                        <img src='$row[Image]' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[Name]</h5>
                            <p class='card-text'>$row[Price]</p>
                            <a href='delete.php? id=$row[ID]'  class='btn btn-danger'>حذف المنتج</a>
                            <a href='update.php? id=$row[ID]' class='btn btn-primary'>تعديل المنتج </a>
                        </div>
                    </div>
                </main>

            </center>
        
            ";
    };
    ?>
    <script src="src/js/bootstrap.min.js"></script>
</body>
</html>