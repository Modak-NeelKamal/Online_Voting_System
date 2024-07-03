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
    require("../include/db.php");
    include("adminheader.php");
    if (!isset($_SESSION['admin_id'])) {
        header("location:../adminlogin.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="col-sm-6">
            <h2>Add Details of Candidate</h2>
            <form method="POST">
                <?php
                $elections_name = $_GET["elections_name"];
                $total_candidates = $_GET["total_candidates"];
                ?>
                <label>Election Name</label>
                <input type="text" name="elections_name" value="<?php echo $elections_name; ?>" class="form-control" readonly="readonly">
                <?php
                for ($i = 1; $i <= $total_candidates; $i++) {
                ?>
                    <div class="form-group">
                        <label>Candidate Name <?php echo $i; ?></label>
                        <input type="text" name="candidates_name<?php echo $i; ?>" class="form-control">
                    </div>
                <?php
                }
                ?>
                <input type="submit" name="add_detail_candidates" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['add_detail_candidates'])) {
    $total_candidates = $_GET["total_candidates"];
    $elections_name = $_POST["elections_name"];

    for ($i = 1; $i <= $total_candidates; $i++) {
        $candidates_name[] = $_POST['candidates_name' . $i];
    }

    for ($i = 0; $i < $total_candidates; $i++) {
        $insert = "INSERT INTO candidates_tbl (candidates_name, elections_name) VALUES ('$candidates_name[$i] ', '$elections_name')";
        $run = $conn->query($insert);
    }

    if ($run) {
        echo "<script>alert('Candidates are added for the Election')</script>";
        echo "<script>window.location.href = 'add_candidates.php';</script>";
    } else {
        echo "error";
    }
}
?>