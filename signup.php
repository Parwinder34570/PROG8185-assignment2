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
    <title>Register</title>
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
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <p class="h3 aligns-items-center" id="welcomeMessage"></p>
                <br>

                <?php
                session_start();
                if (isset($_POST['RegisterButton'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $password = $_POST['pwd'];
                    $address_line1 = $_POST['address_line1'];
                    $address_line2 = $_POST['address_line2'];
                    $city = $_POST['city'];
                    $province = $_POST['province'];
                    $country = $_POST['country'];
                    $mobile_no = $_POST['mobile_no'];
                    $mobile_business = $_POST['mobile_business'];
                    $secondary_email = $_POST['secondary_email'];
                    $postal_code = $_POST['postal_code'];

                    $sql = "SELECT username FROM user WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $active = $row['active'];

                    $count = mysqli_num_rows($result);

                    if ($count == 1) {
                ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Error!</strong> Username already exist. Try with different username.
                        </div>
                        <?php
                    } else {
                        $sql1 = "INSERT INTO `user`
                        VALUES ('$username', '$email', '$fullname', '$password', '$address_line1', '$address_line2', '$city', '$province', '$country', '$mobile_no', '$mobile_business','$secondary_email', '$postal_code')";
                        echo $sql;
                        echo $sql1;
                        if ($conn->query($sql1) === TRUE) {
                            echo "case true";
                            header("Location: login.php?message=Signup Successful, you can login now");
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Error!</strong> There is some technical issue occurs. Try again !!
                            </div>
                <?php
                        }
                    }
                }
                ?>


                <div class="login_div">
                    <div class="container">
                        <form action="#" method="post">
                            <div class="mb-3 mt-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="fullname" class="form-label">Fullname:</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="address_line1" class="form-label">Address Line1:</label>
                                <input type="text" class="form-control" id="address_line1" placeholder="Enter Address Line1" name="address_line1" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="address_line2" class="form-label">Address Line2:</label>
                                <input type="text" class="form-control" id="address_line2" placeholder="Enter Address Line2" name="address_line2">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="city" class="form-label">City:</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="province" class="form-label">Province:</label>
                                <input type="text" class="form-control" id="province" placeholder="Enter Province" name="province" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="country" class="form-label">Country:</label>
                                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="mobile" class="form-label">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No." name="mobile_no" required>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="mobile_business" class="form-label">Mobile Business:</label>
                                <input type="text" class="form-control" id="mobile_business" placeholder="Enter Mobile Number (Business)" name="mobile_business">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="secondary_email" class="form-label">Secondary Email:</label>
                                <input type="text" class="form-control" id="secondary_email" placeholder="Enter Secondary email" name="secondary_email">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="postal_code" class="form-label">Postal Code:</label>
                                <input type="text" class="form-control" id="postal_code" placeholder="Enter Postal Code" name="postal_code" required>
                            </div>
                            <input type="Submit" value="Register" class="submit" id="submit" name="RegisterButton" />

                        </form>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        showMessage();
    </script>
</body>

</html>