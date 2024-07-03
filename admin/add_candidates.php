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
            <h2>Add Candidate</h2>
            <form method="GET" action="add_details_candidates.php">
                <class="form-group">
                    <label for="">Select Election Name</label>
                    <select class="form-control" name="elections_name">
                        <option value="" selected="selected">Select Election</option>
                        <?php

                        $select = "SELECT * FROM elections_tbl";
                        $run = $conn->query($select);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_array()) {

                        ?>
                                <option value="<?php echo $row['elections_name']; ?>"><?php echo $row['elections_name']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                    <div class="form-group">
                        <label for="">No. of Candidates</label>
                        <input type="text" name="total_candidates" class="form-control">
                        <br>
                        <input type="submit" name="add candidate" class="btn btn-success">
                    </div>
        </div>
    </div>

    </form>
    </div>
    </div>
</body>

</html>