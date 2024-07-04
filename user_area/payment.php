<?php
error_reporting(E_ERROR | E_PARSE);
include("./includes/connection.php");
include("./functions/functions.php");
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>IndiMart | Payment</title>
  <style>
    img {
      width: 100%;
    }
  </style>
</head>

<body>
  <!-- to acess userid -->
  <?php
  $con=mysqli_connect("localhost","root","","mystore1");
  if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
  }
  function getIPAddress()
  {
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }
  $ip = getIPAddress();
  $getUser="SELECT * FROM `user` WHERE ip='$ip'";
  $result= mysqli_query($con, $getUser);
  $run_query=mysqli_fetch_array($result);
  $userId=$run_query['userId'];

  ?>
  <div class="container">
    <h2 class="text-center">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-md-6">
        <a href="#">Payment <img src="..\assets\images\upi.jpg" alt=""></a>
      </div>
      <div class="col-md-6">
        <a href="order.php?userId=<?php echo $userId?>">
          <h2 class="text-center">Pay offline</h2>
        </a>
      </div>
    </div>
  </div>


  <footer class="text-center mt-5 my-auto">Policies:Returns Policy | Terms of use | Security | Privacy | Infringement  © 2024 IndiMart.com | Need help? Visit the Help Center or Contact Us</footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>