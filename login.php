<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <link href="css/main.css" rel="stylesheet" />
  <title>User Login</title>

</head>

<body style="background-color: #F9F5EB">

<?php
   require 'connection.php';
?>

  <!--Header-->
  <nav class="navbar navbar-expand-sm navbar-custom navbar-dark">
    <div class="container-fluid">
      <header>
        <img src="images/my_bank_logo.png" width="50" />
        &nbsp;<a class="navbar-brand" href="login.html">MyBank</a>
      </header>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
  </nav>

  <!--Main Content-->
  <div class="container">
    <br>
    <?php
   
    session_start();
    
    if (isset($_POST['LoginButton'])) {
      $username = $_POST['username'];
      $password = $_POST['pswd'];

      $sql = "SELECT username FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['username'] = $username;
         
         header("location: accounts_summary.php");
      }else {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Error!</strong> Wrong Username or Password. Try again !!
        </div>
      <?php
      }
   }
?>
    <div class="row">

      <div class="col">
        <p class="h3 aligns-items-center" id="welcomeMessage"></p>
        <br>

        <div class="login_div">
          <div class="container">
            <form action="#" method="post">
              <div class="mb-3 mt-3">

                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
              </div>
              <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="pswd">
              </div>
              <input type="Submit" value="Login" class="submit" id="submit" name="LoginButton" />
              <button type="button" class="submit" onclick="loadSignupPage()">
                Register Now
              </button>
            </form>

            
          </div>
        </div>
      </div>
    </div>


  </div>

  </div>

  <br>
  <br>
  <br>

  <!--Footer Content-->
  <?php include 'footer.php'; ?>
</body>
<script>
  showMessage();

  function loadSignupPage(){
    window.location.href = "register.php";
  }
</script>

</html>