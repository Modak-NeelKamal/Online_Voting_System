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
    <title>Admin Index</title>
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require("admin/db.php");
    $error = "";
    $success = "";
    if (isset($_POST['login'])) {
        $admin_id = $_POST['admin_id'];
        $admin_password = $_POST['admin_password'];
        $select = "select * from adminpanel where admin_id = '$admin_id' and admin_password = '$admin_password'";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $_SESSION['admin_id'] = $admin_id = $row['admin_id'];
                $_SESSION['admin_password'] = $admin_password = $row['admin_password'];
                header("Location: admin/adminheader.php");
            }
        } else {
            $error = "<span>Invalid email or password ! Try again</span>";
        }
    }
    ?>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Admin System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="reg.php">Registration</a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                    <li class="active"><a href="adminlogin.php">Administration</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                    <li class="active"><a href="developerdetails.php">Developer Details</a></li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="row">
            <div class="col col-sm-8 col-sm-offset-2 bg-success">
                <form method="post">
                    <h3 class="text text-center" style="color:white; background-color: #007bff;color: #fff;border-color: #007bff;padding:8px 0;">Admin Login</h3>
                    <h5 class='text text-danger  text-center '>
                        <?php
                        if ($error != "") {
                            echo $error;
                        }
                        if ($success != "") {
                            echo $success;
                        }
                        ?>
                    </h5>
                    <div class="form-group text text-center">
                        <label for="Id" style="font-size: 20px;">Admin ID</label>
                        <input type="text" name="admin_id" id="email" class="form-control" placeholder="Enter Admin Id">
                    </div>
                    <div class="form-group text text-center">
                        <label for="password" style="font-size: 20px;">Password</label>
                        <div class="form-group">
                            <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text text-center">
                        <button type="submit" class="btn btn-success btn-block" name="login" style="font-size: 20px;">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        include("include/footer.php");
        ?>
        <script src="js/jQueryv3.7.1.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/npm.js"></script>
</body>

</html>