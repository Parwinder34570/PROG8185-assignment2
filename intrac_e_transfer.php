<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <link href="css/main.css" rel="stylesheet" />
  <script type="text/javascript" src="js/main.js"></script>
  <title>Accounts Summary</title>
</head>

<body>
  <?php
  require 'connection.php';
  session_start();
  $_SESSION['username'] = 'Parwinder123';
  $username = $_SESSION['username'];

  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    mysqli_set_charset($conn, "utf8");

    $accountsQuery = "SELECT  * FROM `account` WHERE username = '$username' and category = 'Banking'";
    $account_data = mysqli_query($conn, $accountsQuery);

    $payeeQuery = "SELECT  * FROM `payee` WHERE username = '$username'";
    $payee_data = mysqli_query($conn, $payeeQuery);


  ?>

    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Main Content-->

    <div class="container">
      <br>
      <br>
      <div class="login_div">
        
        <?php
        //Send Money Start
        if (isset($_POST['SubmitButton'])) {
          $senderAccountId = $_POST['payee_account'];
          $payeeId = $_POST['payee_name'];
          $payeeQuestion = $_POST['payee_question'];
          $payeeAnswer = $_POST['payee_answer'];
          $payeeAmount = $_POST['payee_amount'];

          $balanceQuery = "SELECT balance FROM `account` WHERE id = " . $senderAccountId;
          $balance_data = mysqli_query($conn, $balanceQuery);
          $balanceRow = mysqli_fetch_assoc($balance_data);
          $balanceAmount = $balanceRow['balance'];
          
          if ($balanceAmount < $payeeAmount) {
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Error!</strong> Not enough balance.
            </div>
          <?php
          } else {
            $sql = "INSERT INTO `transaction` (transaction_amount, from_user, to_account, from_account_id, security_question, security_answer)
      VALUES ('$payeeAmount', '$username', '$payeeId', '$senderAccountId', '$payeeQuestion', '$payeeAnswer')";

            if ($conn->query($sql) === TRUE) {
              ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Success!</strong> Money sent.
            </div>
          <?php
              $sql = "UPDATE `account` set balance = (balance - $payeeAmount) where id = " . $senderAccountId;
              if ($conn->query($sql) === TRUE) {

              } else {
                ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Error!</strong> There is some technical issue.
            </div>
          <?php
              }
            } else {
              ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Error!</strong> This transaction failed with some technical error. Please try again.
            </div>
          <?php
            }
          }
        }
        //Send Money End


        //Add Payee Start
        if (isset($_POST['SavePayee'])) {
          $pName = $_POST['nick_name'];
          $pEmail = $_POST['p_email'];
          $pPhoneNumber = $_POST['p_phone_number'];

          $sql = "INSERT INTO `payee` (nick_name, email, phone_no, username)
VALUES ('$pName', '$pEmail', '$pPhoneNumber', '$username')";

          if ($conn->query($sql) === TRUE) {
        ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Success!</strong> Payee added successfully.
            </div>
          <?php
          } else {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Error!</strong> Error occured while adding payee. Please try later.
            </div>
        <?php
          }
        }
        //Add Payee End
        ?>
        <form action="#" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group mb-3 mt-3">
                <label for="account" class="form-label">Select Account</label>
                <select class="form-control" id="account" name="payee_account">
                  <?php
                  while ($accountRow = mysqli_fetch_assoc($account_data)) {
                  ?>
                    <option value="<?php echo $accountRow['id'] ?>"> <?php echo $accountRow['account_type'] . " - CAD " . $accountRow['balance'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group mb-3 mt-3">
                <label for="payee" class="form-label">Select Payee</label>
                <select class="form-control" id="payee" name="payee_name">
                  <?php
                  while ($payeeRow = mysqli_fetch_assoc($payee_data)) {
                  ?>
                    <option value="<?php echo $payeeRow['id'] ?>"> <?php echo $payeeRow['nick_name'] . " - " . $payeeRow['email'] . " - " . $payeeRow['phone_no'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group mb-3 mt-3">
                <label for="question" class="form-label">Enter interac question</label>
                <input type="text" class="form-control" id="question" name="payee_question" required>
              </div>
              <div class="form-group mb-3 mt-3">
                <label for="answer" class="form-label">Enter interac answer</label>
                <input type="text" class="form-control" id="answer" name="payee_answer" required>
              </div>
              <div class="form-group mb-3 mt-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="payee_amount">
              </div>
              <input type="Submit" value="Send Money" class="submit" id="submit" name="SubmitButton" />

              <button type="button" class="submit" data-bs-toggle="modal" data-bs-target="#myModal">
                Add New Payee
              </button>
            </div>

          </div>
        </form>
      </div>

      <!--  -->
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add New Payee</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="#" method="post">
                <div class="form-group">
                  <label for="payee-nickname" class="col-form-label">Nickname</label>
                  <input type="text" class="form-control" id="payee-nickname" name="nick_name">
                </div>
                <div class="form-group">
                  <label for="payee-email" class="col-form-label">Email</label>
                  <input type="text" class="form-control" id="payee-email" name="p_email">
                </div>
                <div class="form-group">
                  <label for="payee-phone" class="col-form-label">Phone No.</label>
                  <input type="text" class="form-control" id="payee-phone" name="p_phone_number">
                </div>
                <input type="Submit" value="Save" class="submit" name="SavePayee" />
              </form>
            </div>

          </div>
        </div>
      </div>
      <!--  -->

    </div>

    <br>
    <br>
    <br>
    <?php include 'footer.php'; ?>
    <script>
      var element1 = document.querySelector("[href='accounts_summary.php']");
      element1.className = "nav-link";

      var element2 = document.querySelector("[href='customer_information.php']");
      element2.className = "nav-link";

      var element3 = document.querySelector("[href='intrac_e_transfer.php']");
      element3.className = "nav-link active";
    </script>
</body>

</html>
<?php
  } else {
    header("Location: login.php");
    exit();
  }
?>