<!--
    Parwinder Singh Ranota
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="css/main.css" rel="stylesheet" />
  <title>Accounts Summary</title>

</head>

<body>
  <?php
  require 'connection.php';
  session_start();
  $_SESSION['username'] = 'Parwinder123';
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    mysqli_set_charset($conn, "utf8");
    $selectQuery = "SELECT  * FROM `user` WHERE username = '$username'";
    $user_data = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($user_data);

    $fullName = $row['full_name'];
    $email = $row['email'];
    $address = trim($row['address_line1'] . " " . $row['address_line2']);
    $province = $row['province'];
    $country = $row['country'];
    $city = $row['city'];
    $postalCode = $row['postal_code'];
    $mobile_no = $row['mobile_no'];
    $mobile_business = $row['mobile_business'];
    $email_secondary = $row['email_secondary'];

    $accountsQuery = "SELECT  * FROM `account` WHERE username = '$username'";
    $account_data = mysqli_query($conn, $accountsQuery);
    //$accountRow = mysqli_fetch_assoc($account_data);


  ?>
    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Main Content-->
    <div class="container">
      <br>
      <br>
      <div class="row">
        <div class="col">

          <table class="table">
            <tbody>
              <tr>
                <td colspan="2">
                  <img src="images/dummy-profile-pic.jpg" style="text-align: center;" class="mx-auto d-block img-thumbnail" width="250" alt="Profile Picture">
                </td>
              </tr>
              <tr class="total-balance-table-row">
                <td>Contact</td>
                <td></td>
              </tr>
              <tr>
                <td>Personal: </td>
                <td><?php echo $mobile_no ?></td>
              </tr>
              <tr>
                <td>Business: </td>
                <td><?php echo $mobile_business ?></td>
              </tr>

              <tr class="total-balance-table-row">
                <td>Email</td>
                <td></td>
              </tr>
              <tr>
                <td>Primary Email Address: </td>
                <td><?php echo $email ?></td>
              </tr>
              <tr>
                <td>Secondary: </td>
                <td><?php echo $email_secondary ?></td>
              </tr>
            </tbody>
          </table>


        </div>
        <div class="col">
          <table class="table">
            <tbody>
              <tr class="total-balance-table-row">
                <td>Primary Address</td>
                <td></td>
              </tr>
              <tr>
                <td>Name: </td>
                <td><?php echo $fullName ?></td>
              </tr>
              <tr>
                <td>Address: </td>
                <td><?php echo $address ?></td>
              </tr>
              <tr>
                <td>City: </td>
                <td><?php echo $city ?></td>
              </tr>
              <tr>
                <td>Province: </td>
                <td><?php echo $province ?></td>
              </tr>
              <tr>
                <td>Postal Code: </td>
                <td><?php echo $postalCode ?></td>
              </tr>
              <tr>
                <td>Country: </td>
                <td><?php echo $country ?></td>
              </tr>
            </tbody>
          </table>
          <table class="table">
            <tbody>
              <tr>
                <td class="total-balance-table-row">
                  My Accounts
                </td>
              </tr>
              <?php
              while ($accountRow = mysqli_fetch_assoc($account_data)) {
                ?>
                 <tr>
                <td>
                  <?php echo $accountRow['account_type']?> 
                </td>
                <td>
                <?php echo $accountRow['account_no']?>
                </td>
              </tr>
                <?php
              }
              ?>
             

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>

    <!--Footer Content-->
    <?php include 'footer.php'; ?>
</body>

</html>
<?php
  } else {
    header("Location: login.html");
    exit();
  }
?>