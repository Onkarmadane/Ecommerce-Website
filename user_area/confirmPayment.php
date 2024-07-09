<?php
error_reporting(E_ERROR | E_PARSE);
include("./includes/connection.php");
session_start();
$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['orderId'])) {
  $orderId = $_GET['orderId'];
  
  // Retrieve order details
  $selectData = "SELECT * FROM `userorders` WHERE orderId='$orderId'";
  $result = mysqli_query($con, $selectData);
  $row_fetch = mysqli_fetch_array($result);
  $invoiceNumber = $row_fetch['invoiceNumber'];
  $dueAmt = $row_fetch['dueAmt'];
  $product_title = $row_fetch['product_title'];
  $totalProducts = $row_fetch['totalProducts'];
}

if (isset($_POST['confirmPayment'])) {
  $invoiceNumber = $_POST['invoiceNumber'];
  $dueAmt = $_POST['dueAmt'];
  $paymentMode = $_POST['paymentMode'];

  // Insert payment details
  $insert_query = "INSERT INTO `userpayments` (orderId, invoiceNumber, dueAmt, paymentMode) VALUES ('$orderId', '$invoiceNumber', '$dueAmt', '$paymentMode')";
  $result = mysqli_query($con, $insert_query);
  if ($result) {
    echo "<script>alert('Payment Successful');</script>";
    echo "<script>window.open('profile.php?myorders','_self');</script>";
  } else {
    echo "<script>alert('Payment Failed');</script>";
  }

  // Update order status
  $updateOrders = "UPDATE `userorders` SET orderStatus='Complete' WHERE orderId='$orderId'";
  $resultOrders = mysqli_query($con, $updateOrders);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <title>IndiMart | Confirm Payment</title>
</head>

<body class="bg-light">
  <div class="container my-5">
    <h1 class="text-center" style="color:var(--blue);"><b>Confirm Payment</b></h1>
    <hr class=" w-75 mx-auto" style="color:var(--blue)">
    <form action="" method="POST" class="form w-75 mx-auto p-3 rounded">
      <div class="my-4 form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" name="product_title" value="<?php echo $product_title ?>" style="border-radius: 50px; border:1px solid var(--blue);" readonly>
      </div>
      <div class="my-4 form-group">
        <label>Quantity</label>
        <input type="text" class="form-control" name="totalProducts" value="<?php echo $totalProducts ?>" style="border-radius: 50px; border:1px solid var(--blue);" readonly>
      </div>
      <div class="my-4 form-group">
        <label>Amount</label>
        <input type="text" class="form-control" name="dueAmt" value="<?php echo $dueAmt ?>" style="border-radius: 50px; border:1px solid var(--blue);" readonly>
      </div>
      <div class="my-4 form-group">
        <label>Invoice Number</label>
        <input type="text" class="form-control" name="invoiceNumber" value="<?php echo $invoiceNumber ?>" style="border-radius: 50px; border:1px solid var(--blue);" readonly>
      </div>
      <div class="my-4 form-group">
        <label>Payment Mode</label>
        <select name="paymentMode" class="form-select form-select-lg mb-3" style="border-radius: 50px; border:1px solid var(--blue);">
          <option selected>Select Payment Mode</option>
          <option>UPI</option>
          <option>NetBanking</option>
          <option>PayPal</option>
          <option>Cash On Delivery</option>
          <option>Pay Offline</option>
        </select>
      </div>
      <button type="submit" name="confirmPayment" class="btn btn-primary float-end">Confirm Payment</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3XbXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
