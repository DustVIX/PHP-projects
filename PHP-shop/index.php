<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Shop online | اضافة منتجات</title>
</head>
<body>

    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>موقع تسويقي اونلاين</h2>
                <img src="src/img/pngegg.png" alt="logo" width="200px">
                <br>
                <input type="text" name="name">
                <br>
                <input type="text" name="price">
                <br>
                <input type="file" id="file" name="img" style="display: none;">
                <label for="file"> رفع صورة المنتج</label>
                <button name="upload">رفع المنتج</button>
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