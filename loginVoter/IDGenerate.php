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
    <title>ID Generator </title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .animated-text {
            font-size: 3em;
            font-weight: bold;
            animation: popAndVanish 2s infinite;
        }

        @keyframes popAndVanish {

            0%,
            100% {
                opacity: 0;
                transform: scale(0.5);
            }

            20% {
                opacity: 1;
                transform: scale(1.2);
            }

            40% {
                transform: scale(1);
            }

            60% {
                opacity: 1;
                transform: scale(1.2);
            }

            80% {
                opacity: 0;
                transform: scale(0.5);
            }
        }
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
        <h1 class="animated-text">ID GENERATOR</h1>
    </div>
    <?php
    $user_email = $_SESSION['users_email'];
    $select = "select * from id_request_tbl where users_email = '$user_email'";
    $run = $conn->query($select);
    if ($run->num_rows > 0) {
    ?>
        <div class="col-sm-6 col-sm-offset-3 bg-success alert">
            <h4>You have already requested for id generate wait for response</h4>
        </div>
    <?php
    } else {
    ?>
        <?php
        $select = "select * from usersreg_db where users_email='$user_email'";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $user_name = $row['users_name'];
                $user_email = $row['users_email'];
                $user_district = $row['users_district'];
                $useridgenerated = $row['useridgenerated'];
            }
        }
        if ($useridgenerated != "") {
        ?>
            <div class="cotainer">
                <div class="col-sm-6 col-sm-offset-3 bg-primary alert">
                    <h3>Your Id is</h3>
                </div>
                <div class="col-sm-6 col-sm-offset-3 bg-success alert">
                    <h4><span class="text text-danger"><?php echo $useridgenerated; ?></span></h4>

                </div>
                <div class="container">
                    <h5>Note: Id is used to cast your vote ...!</h5>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-sm-6 col-sm-offset-3 bg-success alert">
                <form method="post">
                    <div class="form-group">
                        <label for=""> User Name </label>
                        <input type="text" name="user_name" id="" class="form-control" required value="<?php echo $user_name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> User Email </label>
                        <input type="text" name="user_email" id="" class="form-control" required value="<?php echo $user_email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> User State </label>
                        <input type="text" name="user_district" id="" class="form-control" required value="<?php echo $user_district; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="idrequest" class="btn btn-info btn-block">Generate ID</button>
                    </div>
                </form>
            </div>


    <?php
        }
    }
    ?>

    <?php
    if (isset($_POST['idrequest'])) {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_district = $_POST['user_district'];
        require("../include/db.php");

        $insert = " insert into id_request_tbl (users_name,users_email,users_district) values('$user_name','$user_email','$user_district')";
        $run = $conn->query($insert);
        if ($run) {
            echo "<script>alert('Your request has been submitted')</script>";
            echo "<script>window.open('IDGenerate.php','_self')</script>";
        } else {
            echo "error";
        }
    }


    ?>
    <div class="">
        <?php
        include("../include/footer.php");
        ?>
    </div>

</body>


</html>