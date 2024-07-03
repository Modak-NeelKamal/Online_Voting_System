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
    include("../include/voterheader.php");
    if (!isset($_SESSION['useridgenerated'])) {
        echo "<script>window.location.href = 'election.php';</script>";
        exit();
    }
    ?>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <h2 class="text text-info">Result of the Election</h2>
            <form method="post" action="">
                <div class="form-group">
                    <select class="form-control" name="elections_name">
                        <option selected="selected" value="">Select Option</option>
                        <?php
                        $current_time = time();
                        $select = "SELECT * FROM elections_tbl";
                        $run = $conn->query($select);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_array()) {
                                $elections_name = $row['elections_name'];

                        ?>
                                <?php
                                ?>
                                <option value="<?php echo $row['elections_name']; ?>"><?php echo $row['elections_name']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="search_results" value="Search Result" class="btn btn-success">
                </div>
            </form>

            <table class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr style="font-size: 20px; color: red; text-align: center;">
                        <td>Candidate Id</td>
                        <td>Candidate Name</td>
                        <td>Obtain Votes</td>
                        <td>Winning Status</td>
                    </tr>
                </thead>
                <?php
                if (isset($_POST['search_results'])) {
                    $elections_name = $_POST['elections_name'];
                    $select = "select * from results_tbl where elections_name ='$elections_name'";
                    $run = $conn->query($select);
                    $total_election_votes = 0;
                    if ($run->num_rows > 0) {
                        while ($row = $run->fetch_array()) {
                ?>
                            <div class="col-sm-responsive col-offset-2" style="font-size: 20px; background-color:#FFD700;color: #4B0082; text-align: center;"><?php echo $elections_name; ?></div>
                        <?php
                            $total_election_votes = $total_election_votes + 1;
                        }
                    }
                    $select2 = "SELECT * FROM candidates_tbl WHERE elections_name ='$elections_name'";
                    $run2 = $conn->query($select2);
                    if ($run2->num_rows > 0) {
                        $total = 0;
                        while ($row2 = $run2->fetch_array()) {
                            $total = $total + 1;
                            $candidates_name = $row2['candidates_name'];
                            $obtain_votes = $row2['total_votes'];
                            $percentage = (($obtain_votes / $total_election_votes) * 100);
                        ?>
                            <tr>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $candidates_name; ?></td>
                                <td><?php echo $obtain_votes; ?></td>
                                <td>
                                    <?php
                                    if ($percentage > 50) {
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%"><?php echo $percentage; ?></div>
                                        </div>
                                    <?php
                                    } else if ($percentage > 30) {
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%"><?php echo $percentage; ?></div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%"><?php echo $percentage; ?></div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>

                            </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total votes</td>
                            <td><?php echo $total_election_votes; ?></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tbody>
                            <tr>
                                <td colspan="4">Record not found </td>
                            </tr>
                        </tbody>
                <?php
                    }
                }
                ?>
            </table>

        </div>
    </div>

    <?php
    include("../include/footer.php");
    ?>
</body>

</html>