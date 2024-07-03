<?php
error_reporting(E_ERROR | E_PARSE);
// include("../functions/functions.php");
include("../includes/connection.php");
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IndiMart | Checkout</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo1.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- Font Awesome And Google font -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/index.php"><img src="./assets/images/logo1.png" alt="" style="height: 50px !important;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto mx-5">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (!isset($_SESSION['username'])) {
                  echo "<i class='fa fa-user'></i> Guest";
                } else {
                  echo"<i class='fa fa-user'></i> ". $_SESSION['username'];
                }
                ?>
              </a>
              <ul class="dropdown-menu">
                <?php

                if (!isset($_SESSION['username'])) {
                  echo ' <li class="dropdown-item">
              <a class="nav-link " href="./user_area/userLogin.php"> <i class="fa fa-user"></i> Login</a>
            </li>';
                } else {
                  echo ' <li class="dropdown-item">
              <a class="nav-link " href="./user_area/userLogout.php"> <i class="fa fa-user"></i> Logout</a>
            </li>';
                }
                ?>
                <!-- <li><a class="dropdown-item" href="#">Logout</a></li> -->

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="row px-1">
    <div class="col-md-12">
      <div class="row">
        <?php
        if (!isset($_SESSION['username'])) {
          include('userLogin.php');
          // include('userRegistration.php');
        } else {
          include('payment.php');
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>