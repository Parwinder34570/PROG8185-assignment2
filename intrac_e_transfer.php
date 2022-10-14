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
    <link href="css/main.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Accounts Summary</title>
    
</head>
<body>
<?php
  require 'connection.php';
  session_start();
  $_SESSION['username'] = 'parwinder123';
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    mysqli_set_charset($conn, "utf8");
    /*$selectQuery = "SELECT  * FROM `user` WHERE username = '$username'";
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
*/
    $accountsQuery = "SELECT  * FROM `account` WHERE username = '$username' and category = 'Banking'";
    $account_data = mysqli_query($conn, $accountsQuery);
    //$row = mysqli_fetch_assoc($account_data);
    //$accountType = $row['account_type'];
  ?>

     <!--Header-->
  <?php include 'header.php'; ?>

      <!--Main Content-->
    
      <div class="container">
        <!-- <div class="balance-detail text-center">
          <div class="balance">
            <br>
            <p class="mb-0">Chequing Balance</p>
            <h4 class="text-success">$5000</h4>
          </div>
        </div> -->
        <div class="login_div">
          <div class="row">
            <div class="col">
              <!-- <form id="transaction-detail-form" onsubmit="formSubmit()"> -->
              <div class="form-group mb-3 mt-3">
                <label for="account" class="form-label">Select Account</label>
                <select class="form-control" id="account">                                
                   <?php
		              while ($accountRow = mysqli_fetch_assoc($account_data)) {
		                ?>
		                 <option value="<?php echo $accountRow['id']?>"> <?php echo $accountRow['account_type'] - $accountRow['balance']?> </option>
		               <?php
		              }
		              ?>
                </select>
              </div>
                <div class="form-group mb-3 mt-3">
                    <label for="name" class="form-label">Payee Name</label>
                    <input type="text" class="form-control" id="name" required>
              </div>
              <div class="form-group mb-3 mt-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" required>
              </div>
              <div class="form-group mb-3 mt-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="phone" class="form-control" id="phone" required>
              </div>
             
            <!-- </form> -->
            </div>
            <div class="col">
              <div class="form-group mb-3 mt-3">
                <label for="question" class="form-label">Enter interac question</label>
                <input type="text" class="form-control" id="question" required>
          </div>
          <div class="form-group mb-3 mt-3">
                <label for="answer" class="form-label">Enter interac answer</label>
                <input type="text" class="form-control" id="answer" required>
          </div>
          <div class="form-group mb-3 mt-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount">
          </div>
            <input type="button" value="Send Money" class="submit" id="submit" onClick="formSubmit()">
            <!-- <input type="button" value="Add Payee" class="payee_detail submit" id="payee_detail" onClick=""> -->

            <button type="button" id="payee-button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onClick="showModal()">Add Payee</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="payee-name" class="col-form-label">Username</label>
                          <input type="text" class="form-control" id="payee-name">
                        </div>
                        <div class="form-group">
                          <label for="payee-nickname" class="col-form-label">Nickname</label>
                          <input type="text" class="form-control" id="payee-nickname">
                        </div>
                        <div class="form-group">
                          <label for="payee-email" class="col-form-label">Email</label>
                          <input type="text" class="form-control" id="payee-email">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
                  </div>
                </div>
              </div>
            </div>   
          </div>
      </div>
      </div>

      <!--Footer Content-->
       <!--Footer Content-->
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


<!--               <?php
  require 'connection.php';
  session_start();
  $sql = "INSERT INTO payee (id, nick_name, email, username) VALUES ('1', Peter', 'peterparker@mail.com', 'Parker')";

    if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> -->
