<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <title>عربتي</title>
    <style>
        h3{
            font-family: "Tajawal", serif;
            font-weight: bold;
            font-style: normal;
        }
        main{
            width: 40%;
            margin-top: 40px;
        }
        table{
            box-shadow: 1px 1px 10px silver;
        }
        table thead {
        text-align: center;
        background-color: red !important;
        }
        tbody{
            text-align: center;
        }

    </style>
</head>
<body>
    <center>
        <h3>منتجاتك المحجوزة</h3>
    </center>
<?php 
    include('config.php');
    $ressult = mysqli_query($conn, "SELECT * FROM addcard");
    while($row = mysqli_fetch_array($ressult)){
        echo "
            <center>
                <main>
                    <table class='table'>
                        
                        <thead>
                            <tr>
                                <th scope='col'>Prodact Name</th>
                                <th scope='col'>Prodact Price</th>
                                <th scope='col'>Delete Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$row[Name]</td>
                                <td>$row[Price]</td>
                                <td><a href='del_card.php? id=$row[ID]' class='btn btn-danger'>ازالة</a></td>
                            </tr>
                        </tbody>
                    </table>            
                </main>
            </center>        
        ";


    };


    ?>
    <center>
        <a href="shop.php">الرجوع لصفحة المنتجات</a>
    </center>





    <script src="src/js/bootstrap.min.js"></script>
</body>
</html>