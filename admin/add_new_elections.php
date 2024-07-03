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
    <title>Admin Add Elections </title>
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
            <h2>Add New Election</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="">Election Name</label>
                    <input type="text" name="elections_name" class="form-method"></input>
                </div>
                <div class="form-group">
                    <label for="">Election Start Date</label>
                    <input type="date" name="elections_start_date" class="form-method"></input>
                </div>
                <div class="form-group">
                    <label for="">Election End Date</label>
                    <input type="date" name="elections_end_date" class="form-method"></input>
                </div>
                <button class="btn btn-primary" name="add_elections">Submit</button>
            </form>
        </div>
    </div>
    <?php
    require("db.php");
    if (isset($_POST['add_elections'])) {
        $elections_name = $_POST['elections_name'];
        $elections_start_date = $_POST['elections_start_date'];
        $elections_end_date = $_POST['elections_end_date'];

        $insert = "insert into elections_tbl (elections_name, elections_start_date, elections_end_date) values ('$elections_name','$elections_start_date','$elections_end_date')";
        $run = $conn->query($insert);
        if ($run) {
            echo "<script>alert('New Election is Added')</script>";
            echo "<script>window.location.href = 'add_candidates.php';</script>";
        } else {
            echo "error";
        }
    }
    ?>
    <?php
    include("footer.php");
    ?>
</body>

</html>