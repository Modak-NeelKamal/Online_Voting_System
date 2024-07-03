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
        .container {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .welcome-text {
            font-size: 30px;
            font-weight: bold;
            padding: 10px;
        }

        .image-container {
            position: relative;
            height: 500px;
            width: 300px;
        }

        .Image1,
        .Image2 {
            position: absolute;
            height: 100%;
            width: 100%;
        }

        .Image2 {
            left: 50px;
            top: 0px;
            opacity: 0.7;
            position: relative;
            animation-name: vote;
            animation-duration: 5s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;

        }

        @keyframes vote {
            0% {
                top: 0px;
            }

            100% {
                top: 150px;
                left: 50px;
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
        <div class="row">
            <div class="col-12">
                <div class="image-container">
                    <img src="../Images/B3-BH262_blockv_JV_2018080112193788.jpg" alt="vote_image" class="img img-responsive Image1">
                    <img src="../Images/B3-BH262_blockv_JV_20180801121937.png" alt="vote_image" class="img img-responsive Image2">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text text-center text-info alert bg-primary">
                    <a href="reg.php" style="color: white; text-decoration: none;"> How to cast vote ?</a>
                </h3>
                <div class="col-sm-6">
                    <h4>
                        <ul>
                            <li> Firstly select <b>"ID Generator"</b> from navigator </li>
                            <li> Send request to <b>"Admin"</b> for generate your ID </li>
                            <li> Click on <b>"Election"</b> from the navigation bar </li>
                            <li> Select available election </li>
                        </ul>
                    </h4>
                </div>
                <div class="col-sm-6">
                    <img src="../Images/gjh-1554797827-1554832091.jpg" alt="vote_image" class="img img-responsive">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <?php
        include("../include/footer.php");
        ?>
    </div>
</body>

</html>