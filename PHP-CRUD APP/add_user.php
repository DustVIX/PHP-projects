<?php
include_once('db.php');

$action = 'add';
$name = "";
$email = "";
$password = "";
$Phone = "";
$btn = 'send';

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $ID = $_GET['id'];
    $edit_sql = "SELECT * FROM users WHERE id = $ID";
    $rse_edit = mysqli_query($conn, $edit_sql);

    if ($rse_edit) {
        $action = 'update';
        $current_user = $rse_edit->fetch_assoc();
        $name = $current_user['Name'];
        $email = $current_user['Email'];
        $password = $current_user['Password'];
        $Phone = $current_user['Mobile'];
        $btn = 'save';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <title>User app</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo $action; ?> user</h2>
                <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
        </div>

        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input type="text" class="form-control" value="<?php echo $name; ?>" name="Name" aria-describedby="nameHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" value="<?php echo $email; ?>" name="Email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" value="<?php echo $password; ?>" name="Password" aria-describedby="passwordHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPhone1" class="form-label">Phone number</label>
                <input type="text" class="form-control" value="<?php echo $Phone; ?>" name="Phone" aria-describedby="phoneHelp">
            </div>

            <?php if (isset($_GET['id'])) { ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <?php } ?>

            <button type="submit" class="btn btn-primary" name="save" value="<?php echo $action; ?>"><?php echo $btn; ?></button>
        </form>
    </div>

    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>
