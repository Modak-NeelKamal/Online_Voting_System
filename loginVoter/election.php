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
    <title>Welcome Voter</title>
    <style>

    </style>

</head>

<body>
    <?php
    session_start();
    require("../session_manager.php");
    require("../include/db.php");
    include("../include/voterheader.php");
    if (!isset($_SESSION['users_email'])) {
        header("location:../login.php");
        exit();
    }
    ?>

    <div class="container">
        <div class="col-sm-6 col-sm-offset-3 bg-success alert">
            <form method="post">
                <div class="form-group">
                    <label for=""> User ID </label>
                    <input type="text" name="user_id" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for=""> User Password</label>
                    <input type="password" name="user_password" id="" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-info btn-block">Enter Voting Area</button>
                </div>
            </form>
        </div>

    </div>
    <?php
    if (isset($_POST['login'])) {
        $user_id = $_POST['user_id'];
        $user_password = $_POST['user_password'];
        $select = "select * from usersreg_db where users_password = '$user_password' and useridgenerated = '$user_id'";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_assoc()) {
                $_SESSION['useridgenerated'] = $row['useridgenerated'];
            }
            echo "<script>window.location.href = 'vote.php';</script>";
        } else {
            echo "Your ID or password is incorrect";
        }
    }
    ?>

    <?php
    include("../include/footer.php");
    ?>
</body>

</html>