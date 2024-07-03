<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    session_start();
    include("include/header.php");
    ?>
    <?php
    require("include/db.php"); 
    $error = "";
    $success = "";
    if (isset($_POST['login'])) {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $select = "select * from usersreg_db where users_email='$user_email'and users_password='$user_password'";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $_SESSION['users_name'] = $user_name = $row['users_name'];
                $_SESSION['users_email'] = $user_email = $row['users_email'];
                // echo "<script>window.location.href='loginVoter/welcome.php'</script>";
                header("location:loginVoter/welcome.php");
            }
        } else {
            $error = "<span>Invalid email or password ! Try again</span>";
        }
    }
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col col-sm-8 col-sm-offset-2 bg-success">
                <form method="post">
                    <h3 class="text text-center" style="color:white; background-color: #007bff;color: #fff;border-color: #007bff;padding:8px 0;">User Login</h3>
                    <h5 class='text text-danger  text-center '>
                        <?php
                        if ($error != "") {
                            echo $error;
                        }
                        if ($success != "") {
                            echo $success;
                        }
                        ?>
                    </h5>
                    <div class="form-group text text-center">
                        <label for="User email" style="font-size: 20px;">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group text text-center">
                        <label for="password" style="font-size: 20px;">Password</label>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Set Password">
                            <div class="form-group  text text-right">
                                <button class="btn btn-primary" type="button" id="togglePassword">Show</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text text-center">
                        <button type="submit" class="btn btn-success btn-block" name="login" style="font-size: 20px;">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include("include/footer.php");
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function(e) {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.textContent = type === 'password' ? 'Show' : 'Hide';
            });
        });
    </script>
</body>

</html>