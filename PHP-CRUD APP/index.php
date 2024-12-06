<?php
include_once('db.php');
$action = false;

if (isset($_POST['save'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $Phone = $_POST['Phone'];

    if ($_POST['save'] == "add") {
        // استعلام الإدخال
        $save_sql = "INSERT INTO `users` (`Name`, `Email`, `Password`, `Mobile`) VALUES ('$name','$email','$password','$Phone')";
    } else if ($_POST['save'] == "update") {
        // استعلام التحديث
        $id = $_POST['id'];
        if (isset($id) && !empty($id)) {
            $save_sql = "UPDATE `users` SET `Name`='$name', `Email`='$email', `Password`='$password', `Mobile`='$Phone' WHERE `ID`=$id";
        } else {
            die("ID is required for update");
        }
    }

    if (isset($save_sql)) {
        $res_save = mysqli_query($conn, $save_sql);
        if (!$res_save) {
            die(mysqli_error($conn));
        } else {
            $action = $_POST['save'] == "add" ? "add" : "edit";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $ID = $_GET['id'];
    $del_sql = "DELETE FROM users WHERE ID = $ID";
    $rse_del = mysqli_query($conn, $del_sql);

    if (!$rse_del) {
        die(mysqli_error($conn));
    } else {
        $action = "del";
    }
}

$user_sql = "SELECT * FROM users";
$all_user = mysqli_query($conn, $user_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/toastr.min.css">
    <title>User app</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between md-2">
                <h2>All users</h2>
                <div><a href="add_user.php"><i data-feather="user-plus"></i></a></div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($all_user) > 0) {
                        while ($user = mysqli_fetch_assoc($all_user)) { ?>
                            <tr>
                                <td><?php echo $user['ID']; ?></td>
                                <td><?php echo $user['Name']; ?></td>
                                <td><?php echo $user['Email']; ?></td>
                                <td><?php echo $user['Mobile']; ?></td>
                                <td>
                                    <div class="d-flex p-2 justify-content-evenly ">
                                        <i onclick="deleteFun(<?php echo $user['ID']; ?>);" class="text-danger" data-feather="trash-2"></i>
                                        <i onclick="editFun(<?php echo $user['ID']; ?>);" class="text-success" data-feather="edit-2"></i>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="src/js/jquery-3.7.1.min.js"></script>
    <script src="src/js/toastr.min.js"></script>
    <script src="src/js/maine.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/feather.min.js"></script>
    <?php
    if ($action != false) {
        if ($action === "add") { ?>
            <script>
                toastr.success("User added successfully!");
            </script>
        <?php } else if ($action === "edit") { ?>
            <script>
                toastr.success("User updated successfully!");
            </script>
        <?php } else if ($action === "del") { ?>
            <script>
                toastr.success("User deleted successfully!");
            </script>
        <?php }
    }
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>
