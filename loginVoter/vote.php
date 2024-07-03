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

    if (!isset($_SESSION['useridgenerated'])) {
        echo "<script>window.location.href = 'election.php';</script>";
        exit();
    }
    ?>
    <br>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <form method="post">
                <label class="text text-info" style="font-size: 30px;">Election Name</label>
                <select name="elections_name" class="form-control">
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
                <br>
                <input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
            </form>
            <?php
            date_default_timezone_set("Asia/Kolkata");
            if (isset($_POST['search_candidate'])) {
                $elections_name = $_POST['elections_name'];
                $select = "SELECT * from elections_tbl where elections_name = '$elections_name'";
                $run = $conn->query($select);
                if ($run->num_rows > 0) {
                    while ($row = $run->fetch_array()) {
                        $elections_start_date = $row['elections_start_date'];
                        $elections_end_date = $row['elections_end_date'];
                    }
                }
                $current_ts = time();
                $elections_start_date_ts = strtotime($elections_start_date);
                $elections_end_date_ts = strtotime($elections_end_date);
                if ($elections_start_date_ts > $current_ts) {
                    echo "Election didnot start yet!";
                } elseif ($current_ts > $elections_end_date_ts) {
                    echo "The election ended";
                } else {
            ?>
                    <a href="votecast.php?elections_name=<?php echo urlencode(str_replace(' ', '-', $elections_name)); ?>" class="btn btn-primary">Click Here for Vote</a>
            <?php
                }
            }
            ?>

        </div>
    </div>
    <br>
    <?php
    include("../include/footer.php");
    ?>
</body>

</html>