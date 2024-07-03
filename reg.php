<!doctype html>
<html lang="en">

<head>
  <title>registration</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Registration Online Voting</title>
</head>

<body>
  <?php
  include("include/header.php");
  ?>
  <?php
  require("include/db.php");
  $email_Error = "";
  $email_Success = "";
  if (isset($_POST["reg"])) {
    $user_name = $_POST['fullname'];
    $user_email = $_POST['email'];
    $user_gender = $_POST['gender'];
    $user_district = $_POST['district'];
    $user_password = $_POST['password'];
    $select = "select * from usersreg_db where users_email='$user_email'";
    $execute = $conn->query($select);
    if ($execute->num_rows > 0) {
      $email_Error = "<p class =' text text-center text-danger text-uppercase font-weight-bold'>Email already exits</p>";
    } else {
      $insert = "insert into usersreg_db (users_name,users_email,users_gender,users_district,users_password) VALUES ('$user_name','$user_email','$user_gender','$user_district','$user_password')";
      $run = $conn->query($insert);
      if ($run) {
        $email_Success = "<p class = 'text text-center text-success text-uppercase font-weight-bold'>Email registered</p>";
        echo "<script>window.location='login.php';</script>";
      } else {
        echo "error";
      }
    }
  }
  ?>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 alert bg-primary">
        <form method="post">
          <h3 class="text text-center alert-success alert" style="color:black;"> User Registration</h3>
          <?php
          if ($email_Error != "") {
            echo $email_Error;
          }
          if ($email_Success != "") {
            echo $email_Success;
          }
          ?>
          <div class="form-group text text-center">
            <label for="User name" style="font-size: 20px;">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your name">
            <label for="User email" style="font-size: 20px;">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
          </div>
          <div class="form-group text text-center">
            <label for="Gender" style="font-size: 20px;">Gender</label>
            <select name="gender" id="gender" class="form-control">
              <option value="" class="active">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group text text-center">
            <label for="district" style="font-size: 20px;">District</label>
            <select name="district" id="district" class="form-control">
              <option value="" class="active">Select</option>
              <option value="Baksa">Baksa</option>
              <option value="Biswanath">Biswanath</option>
              <option value="Barpeta">Barpeta</option>
              <option value="Cachar">Cachar</option>
              <option value="Bongaigaon">Bongaigaon</option>
              <option value="Chirang">Chirang</option>
              <option value="Charaideo">Charaideo</option>
              <option value="Darrang">Darrang</option>
              <option value="Dhemaji">Dhemaji</option>
              <option value="Dhubri">Dhubri</option>
              <option value="Dibrugarh">Dibrugarh</option>
              <option value="Dima Hasao">Dima Hasao</option>
              <option value="Goalpara">Goalpara</option>
              <option value="Golaghat">Golaghat</option>
              <option value="Hailakandi">Hailakandi</option>
              <option value="Hojai">Hojai</option>
              <option value="Jorhat">Jorhat</option>
              <option value="Kamrup">Kamrup</option>
              <option value="Kamrup Metropolitan">Kamrup Metropolitan</option>
              <option value="Karbi Anglong">Karbi Anglong</option>
              <option value="Karimganj">Karimganj</option>
              <option value="Kokrajhar">Kokrajhar</option>
              <option value="Lakhimpur">Lakhimpur</option>
              <option value="Majuli">Majuli</option>
              <option value="Morigaon">Morigaon</option>
              <option value="Nagaon">Nagaon</option>
              <option value="Nalbari">Nalbari</option>
              <option value="Sivasagar">Sivasagar</option>
              <option value="Sonitpur">Sonitpur</option>
              <option value="South Salmara-Mankachar">South Salmara-Mankachar</option>
              <option value="Tinsukia">Tinsukia</option>
              <option value="Udalguri">Udalguri</option>
              <option value="West Karbi Anglong">West Karbi Anglong</option>
            </select>
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
            <button type="submit" class="btn btn-success btn-block" name="reg" style="font-size: 20px;">SUBMIT</button>
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