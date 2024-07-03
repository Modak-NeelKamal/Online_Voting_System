<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <title>Admin ID Request </title>
</head>

<body>
    <?php
    require("session_manager_admin.php");
    include("adminheader.php");
    if (!isset($_SESSION['admin_id'])) {
        header("location:../adminlogin.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="col-sm-8">
            <h2>All request data</h2>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User District</th>
                    <th>Action</th>
                </tr>
                <?php
                require("db.php");
                $select = "Select * from id_request_tbl";
                $run = $conn->query($select);
                if ($run->num_rows > 0) {
                    $total = 0;
                    while ($row = $run->fetch_array()) {
                        $total = $total + 1;
                        $id = $row['id'];
                ?>
                        <tr>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $row['users_name'] ?></td>
                            <td><?php echo $row['users_email'] ?></td>
                            <td><?php echo $row['users_district'] ?></td>
                            <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td>Record not found</td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
    <div>
        <?php
        include("footer.php");
        ?>
    </div>
</body>

</html>