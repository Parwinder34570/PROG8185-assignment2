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

     <!--Header-->
  <?php include 'header.php'; ?>

      <!--Main Content-->
    
      <div class="container">
        <div class="balance-detail text-center">
          <div class="balance">
            <br>
            <p class="mb-0">Chequing Balance</p>
            <h4 class="text-success">$5000</h4>
          </div>
        </div>
        <div class="login_div">
          <div class="row">
            <div class="col">
              <!-- <form id="transaction-detail-form" onsubmit="formSubmit()"> -->
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