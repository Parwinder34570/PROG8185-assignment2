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
  <!--Header-->
  <?php include 'header.php'; ?>

  <!--Main Content-->
  <div class="container">
    <br>
    <br>


    <?php
  require 'connection.php';
  session_start();
  $_SESSION['username'] = 'Parwinder123';
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    mysqli_set_charset($conn, "utf8");
    $accountsQuery = "SELECT  * FROM `account` WHERE username = '$username'";
    $account_data = mysqli_query($conn, $accountsQuery);
  ?>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="total-balance-table-row">
            My Accounts
          </td>
          <td class="total-balance-table-row">
            Account Number
          </td>
          <td class="total-balance-table-row">
            Category
          </td>
          <td class="total-balance-table-row">
            Balance
          </td>
        </tr>
        <?php
        while ($accountRow = mysqli_fetch_assoc($account_data)) {
        ?>
          <tr>
            <td>
              <?php echo $accountRow['account_type'] ?>
            </td>
            <td>
              <?php echo $accountRow['account_no'] ?>
            </td>
            <td>
              <?php echo $accountRow['category'] ?>
            </td>
            <td>
              <?php echo "CAD ".$accountRow['balance'] ?>
            </td>
          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>
  <?php
  } else {
    header("Location: login.php");
    exit();
  }
  ?>
    <div id="accordion">
      <div class="card card-properties">
        <div class="card-header">
          <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
            Banking
          </a>

        </div>
        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et velit a nibh vehicula ullamcorper. Nunc ut sodales est, pretium porta ante. Proin tristique augue porta, congue magna non, laoreet velit. Praesent maximus lacinia sapien, non placerat odio aliquam sit amet. Proin lorem est, consectetur id lectus laoreet, hendrerit gravida dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In elementum arcu est, sed sodales sapien fermentum blandit. Proin sed leo arcu. Sed scelerisque efficitur dolor. Aenean ut lacus eu ligula consequat rutrum non in sapien. Morbi vel tellus porttitor, ultrices erat et, pharetra nisi. Donec posuere et risus et feugiat. Duis ut convallis tellus. Suspendisse maximus, nulla vel elementum interdum, eros ex pharetra lacus, vitae laoreet odio arcu vel nibh. Maecenas eu est ut ligula interdum luctus.</p>
          </div>
        </div>
      </div>
      <br>
      <div class="card card-properties">
        <div class="card-header">
          <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
            Investments
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et velit a nibh vehicula ullamcorper. Nunc ut sodales est, pretium porta ante. Proin tristique augue porta, congue magna non, laoreet velit. Praesent maximus lacinia sapien, non placerat odio aliquam sit amet. Proin lorem est, consectetur id lectus laoreet, hendrerit gravida dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In elementum arcu est, sed sodales sapien fermentum blandit. Proin sed leo arcu. Sed scelerisque efficitur dolor. Aenean ut lacus eu ligula consequat rutrum non in sapien. Morbi vel tellus porttitor, ultrices erat et, pharetra nisi. Donec posuere et risus et feugiat. Duis ut convallis tellus. Suspendisse maximus, nulla vel elementum interdum, eros ex pharetra lacus, vitae laoreet odio arcu vel nibh. Maecenas eu est ut ligula interdum luctus.</p>
          </div>
        </div>
      </div>
      <br>
      <div class="card card-properties">
        <div class="card-header">
          <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
            Borrowing
          </a>
        </div>
        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et velit a nibh vehicula ullamcorper. Nunc ut sodales est, pretium porta ante. Proin tristique augue porta, congue magna non, laoreet velit. Praesent maximus lacinia sapien, non placerat odio aliquam sit amet. Proin lorem est, consectetur id lectus laoreet, hendrerit gravida dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In elementum arcu est, sed sodales sapien fermentum blandit. Proin sed leo arcu. Sed scelerisque efficitur dolor. Aenean ut lacus eu ligula consequat rutrum non in sapien. Morbi vel tellus porttitor, ultrices erat et, pharetra nisi. Donec posuere et risus et feugiat. Duis ut convallis tellus. Suspendisse maximus, nulla vel elementum interdum, eros ex pharetra lacus, vitae laoreet odio arcu vel nibh. Maecenas eu est ut ligula interdum luctus.</p>
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