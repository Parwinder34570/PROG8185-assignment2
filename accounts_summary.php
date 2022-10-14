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

  <!--Header-->
  <?php include 'header.php'; ?>

  <!--Main Content-->
  <div class="container">
    <br>
    <br>


    <?php
    require 'connection.php';
    session_start();
    //$_SESSION['username'] = 'Parwinder123';
    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      mysqli_set_charset($conn, "utf8");
      $accountsQuery = "SELECT  * FROM `account` WHERE username = '$username'";
      $account_data = mysqli_query($conn, $accountsQuery);
    ?>
      
    <?php
    } else {
      header("Location: login.php");
      exit();
    }
    ?>



    <div id="accordion">

      <?php
       $index = 0;
      while ($accountRow = mysqli_fetch_assoc($account_data)) {
      $account_id =  $accountRow['id'];
      ?>
        <div class="card card-properties">
          <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse<?php echo $index; ?>">
            <?php echo $accountRow['account_type'] ?> | <?php echo $accountRow['account_no'] ?> |  <?php echo $accountRow['category'] ?> |  <?php echo "CAD " . $accountRow['balance'] ?>
            </a>
          </div>
          <div id="collapse<?php echo $index; ?>" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
            <table class="table">
              <thead>
                <tr class="total-balance-table-row">
                  <td>Date Time</td>
                  <td>Payee</td>
                  <td>Payee's Email</td>
                  <td>Amount (CAD)</td>
                </tr>
              </thead>
            <tbody>
              <?php
              $transactionQuery = "SELECT * FROM `transaction`, `payee` WHERE from_user = '$username' AND to_account = payee.id AND from_account_id = $account_id order by date_time desc limit 15";
              $transactionData = mysqli_query($conn, $transactionQuery);
              while ($transactionRow = mysqli_fetch_assoc($transactionData)){
                ?>
                <tr>
                  <td><?php echo $transactionRow['date_time'] ?></td>
                  <td><?php echo $transactionRow['nick_name'] ?></td>
                  <td><?php echo $transactionRow['email'] ?></td>
                  <td>$<?php echo $transactionRow['transaction_amount'] ?> CAD</td>
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
      <?php
      $index++;
      }
      ?>
    </div>
  </div>
  <br>
  <br>
  <br>

  <!--Footer Content-->
  <?php include 'footer.php'; ?>

  <script>
    var element1 = document.querySelector("[href='accounts_summary.php']");
    element1.className = "nav-link active";

    var element2 = document.querySelector("[href='customer_information.php']");
    element2.className = "nav-link";

    var element3 = document.querySelector("[href='intrac_e_transfer.php']");
    element3.className = "nav-link";
  </script>

</body>

</html>