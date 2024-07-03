<!doctype html>
<html lang="en">

<head>
    <title>Login Header</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #f5f5f5;
        }

        .navbar-nav .nav-item .nav-link {
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.1s, transform 0.1s;
            width: 150px;
            text-align: center;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .navbar-nav .nav-item .nav-link.active {
            background-color: #0056b3;
            color: white;
        }

        b {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <?php

    require("../include/db.php");
    if (!isset($_SESSION['users_email'])) {
        header("location:../login.php");
        exit();
    }
    ?>
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="../loginVoter/welcome.php" class="navbar-brand">Online Voting System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href=" ../loginVoter/IDGenerate.php">ID Generate</a></li>
                    <li class="nav-item"><a class="nav-link active" href="  ../loginVoter/election.php">Election</a></li>
                    <li class="nav-item"><a class="nav-link active" href="  ../loginVoter/result.php">Result</a></li>
                    <li class="nav-item"><a class="nav-link active" href="  ../loginVoter/vote.php">Vote</a></li>
                    <li class="nav-item"><a class="nav-link active" href=" ../loginVoter/userlogout.php">Logout</a></li>
                    <li><a class="nav-link active"><b><i><?php echo $_SESSION['users_name']; ?></b></a></li>
                </ul>
            </div>
        </nav>
    </div>




</body>

</html>