<!doctype html>
<html lang="en">

<head>
    <title>header</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <title>Online Voting</title>
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            background-color: #f5f5f5;
        }

        .center {
            text-align: center;
        }

        b {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Online Voting System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="reg.php">Registration</a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                    <li class="active"><a href="adminlogin.php">Administration</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                    <li class="active"><a href="developerdetails.php">Developer Details</a></li>
                </ul>
            </div>
        </nav>
        <br>
        <h1 class="center">Online Voting System</h1>
        <p>In this System, the project have divided into two section <b>Voter</b> and <b>Admin</b> : </p>
        <div class="row">
            <div class="col-md-6">
                <h4>Voter Section:</h4>
                <p>Voter section, voter can cast their vote for a particular position to their favorite candidate and can cast vote for multiple position and can see the result of overall vote casting. Voter cannot vote for multiple times for a particular post and voter cannot be the candidate.</p>
            </div>
            <div class="col-md-6">
                <h4>Admin Section:</h4>
                <p>The admin panel serves as the central hub for managing and overseeing the entire election process. It provides a range of functionalities designed to ensure smooth and efficient administration. Administrators can easily make various requests, create and configure new elections, and manage candidate information. This robust panel is equipped to handle election setups from start to finish, allowing admins to specify election details, set timelines, and oversee the candidate registration process. With user-friendly interfaces and powerful tools, the admin panel streamlines the administrative tasks associated with running elections, ensuring that every aspect is handled with precision and care.</p>

            </div>
        </div>
    </div>
    <?php
    include("include/footer.php");
    ?>

    <script src="js/jQueryv3.7.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
</body>

</html>