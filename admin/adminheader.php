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
        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .card {
            border: 2px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            text-align: center;
            color: #333;
            font-family: 'Times New Roman', Times, serif;
            border-bottom: 2px solid #ccc;
        }

        .card-body {
            background-color: #f4f4f4;
        }

        .list-group-item {
            background-color: #e9e9e9;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }

        .list-group-item:hover {
            background-color: #d9d9d9;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require("session_manager_admin.php");
    require("db.php");
    if (!isset($_SESSION['admin_id'])) {
        header("location:../adminlogin.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="animated-text">Welcome to Admin Panel</h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <a href="adminheader.php">
                            <ul class="list-group">
                                <li class="list-group-item">Admin Panel
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="add_candidates.php">
                            <ul class="list-group">
                                <li class="list-group-item">Add Candidate
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="add_new_elections.php">
                            <ul class="list-group">
                                <li class="list-group-item">Add Election
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="idrequest.php">
                            <ul class="list-group">
                                <li class="list-group-item">User Request for Id
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="adminlogout.php">
                            <ul class="list-group">
                                <li class="list-group-item">Logout
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>