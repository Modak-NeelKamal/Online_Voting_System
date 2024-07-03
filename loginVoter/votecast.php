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
    <div class="container  d-flex justify-content-center">
        <div class="col-sm-4 col-offset-8">
            <form method="post">
                <?php
                $elections_name = $_GET['elections_name'];
                $elections_name = str_replace('-', ' ', $elections_name);
                ?>
                <div class="form-group">
                    <input type="text" value="<?php echo $elections_name; ?>" class="form-control" readonly>
                </div>
                <?php
                $select = "select *  from candidates_tbl where elections_name = '$elections_name'";
                $run = $conn->query($select);
                if ($run->num_rows > 0) {
                    while ($row = $run->fetch_array()) {
                ?>
                        <div class="form-group">
                            <input type="radio" name="candidates_name" class="list-group" value="<?php echo $row['candidates_name']; ?>">
                            <label>
                                <?php
                                echo $row['candidates_name'];
                                ?>
                            </label>
                        </div>
                <?php
                    }
                }
                ?>
                <input type="submit" name="vote_cast" class="btn btn-primary" value="Cast your vote">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['vote_cast'])) {
        $candidates_name = $_POST['candidates_name'];
        $users_email = $_SESSION['users_email'];
        $select1 = "select * from  results_tbl where users_email = '$users_email' and elections_name = '$elections_name'";
        $exe1 = $conn->query($select1);
        if ($exe1->num_rows > 0) {
            echo "You have already casted your vote for " . $elections_name;
        } else {
            $insert = "INSERT INTO results_tbl(users_email, candidates_name, elections_name) VALUES('$users_email', '$candidates_name', '$elections_name')";
            $run = $conn->query($insert);
            if ($run) {
                $update = "UPDATE candidates_tbl SET total_votes = total_votes + 1 WHERE candidates_name = '$candidates_name' AND elections_name = '$elections_name'";
                $exe = $conn->query($update);
                if ($exe) {
                    echo "<script>alert('Your vote has been cast successfully')</script>";
                    echo "<script>window.location.href = 'vote.php';</script>";
                } else {
                    echo "<script>alert('Failed to cast your vote')</script>";
                }
            } else {
                echo "<script>alert('Error')</script>";
            }
        }
    }
    ?>
    <br>
    <?php
    include("../include/footer.php");
    ?>
</body>

</html>