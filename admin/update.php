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
    <title>Update ID Request </title>
</head>

<body>
    <?php
    require("session_manager_admin.php");
    include("adminheader.php");
    if (!isset($_SESSION['admin_id'])) {
        header("location:../adminlogin.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="col-sm-8">
            <?php
            $prefix = "";
            $postfix = "";
            $useridgenerated = "";
            require("db.php");
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $select = "select * from id_request_tbl where id = '$id'";
                $run = $conn->query($select);
                if ($run->num_rows > 0) {
                    while ($row = $run->fetch_array()) {
                        $user_name = $row['users_name'];
                        $user_email = $row['users_email'];
                        $user_district = $row['users_district'];
                    }
                    switch ($user_district) {
                        case "Baksa":
                            $prefix = "Bak";
                            break;
                        case "Biswanath":
                            $prefix = "Bis";
                            break;
                        case "Barpeta":
                            $prefix = "Bar";
                            break;
                        case "Cachar":
                            $prefix = "Cac";
                            break;
                        case "Bongaigaon":
                            $prefix = "Bon";
                            break;
                        case "Chirang":
                            $prefix = "Chi";
                            break;
                        case "Charaideo":
                            $prefix = "Cha";
                            break;
                        case "Darrang":
                            $prefix = "Dar";
                            break;
                        case "Dhemaji":
                            $prefix = "Dhe";
                            break;
                        case "Dhubri":
                            $prefix = "Dhu";
                            break;
                        case "Dibrugarh":
                            $prefix = "Dib";
                            break;
                        case "Dima Hasao":
                            $prefix = "Dim";
                            break;
                        case "Goalpara":
                            $prefix = "Goa";
                            break;
                        case "Golaghat":
                            $prefix = "Gol";
                            break;
                        case "Hailakandi":
                            $prefix = "Hai";
                            break;
                        case "Hojai":
                            $prefix = "Hoj";
                            break;
                        case "Jorhat":
                            $prefix = "Jor";
                            break;
                        case "Kamrup":
                            $prefix = "Kam";
                            break;
                        case "Kamrup Metropolitan":
                            $prefix = "Met";
                            break;
                        case "Karbi Anglong":
                            $prefix = "Kar";
                            break;
                        case "Karimganj":
                            $prefix = "Kar";
                            break;
                        case "Kokrajhar":
                            $prefix = "Kok";
                            break;
                        case "Lakhimpur":
                            $prefix = "Lak";
                            break;
                        case "Majuli":
                            $prefix = "Maj";
                            break;
                        case "Morigaon":
                            $prefix = "Mor";
                            break;
                        case "Nagaon":
                            $prefix = "Nag";
                            break;
                        case "Nalbari":
                            $prefix = "Nal";
                            break;
                        case "Sivasagar":
                            $prefix = "Siv";
                            break;
                        case "Sonitpur":
                            $prefix = "Son";
                            break;
                        case "South Salmara-Mankachar":
                            $prefix = "SSM";
                            break;
                        case "Tinsukia":
                            $prefix = "Tin";
                            break;
                        case "Udalguri":
                            $prefix = "Uda";
                            break;
                        case "West Karbi Anglong":
                            $prefix = "WKA";
                            break;
                        default:
                            $prefix = "Def";
                            break;
                    }

                    $rand = rand(
                        1234567,
                        9999999
                    );
                    $postfix = "NKM2020";
                    $useridgenerated = $prefix . $rand . $postfix;
                }
            ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for=""> User Name </label>
                        <input type="text" name="user_name" id="" class="form-control" required value="<?php echo $user_name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> User Email </label>
                        <input type="email" name="user_email" id="" class="form-control" required value="<?php echo $user_email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> User District </label>
                        <input type="text" name="user_district" id="" class="form-control" required value="<?php echo $user_district; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> User ID Generated </label>
                        <input type="text" name="useridgenerated" id="" class="form-control" required value="<?php echo strtoupper($useridgenerated); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="form-control btn btn-success " value="Update ID Request">
                    </div>
                </form>
            <?php

            }


            ?>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['update'])) {
    $user_email = $_POST['user_email'];
    $useridgenerated = $_POST['useridgenerated'];
    $update = "update usersreg_db set useridgenerated = '$useridgenerated' where users_email = '$user_email'";
    $run = $conn->query($update);
    if ($run) {
        $delete = "delete from  id_request_tbl where users_email = '$user_email'";
        $del = $conn->query($delete);
        if ($del) {
            echo "<script>alert('ID Generated Successfully !')</script>";
            echo "<script>window.location.href = 'idrequest.php'</script>";
        }
        echo "<script>alert('ID Generated Successfully !')</script>";
    } else {
        echo "<script>alert('Some went wrong!')</script>";
    }
}
?>