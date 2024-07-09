<!-- Connecting of php and DB file -->
<?php
include("./includes/connection.php");
include("./functions/functions.php");
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IndiMart | Home</title>
  <link rel="icon" type="image/x-icon" href="./assets/images/logo1.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Font Awesome And Google font -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./assets/images/logo1.png" alt="" style="height: 50px !important;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <form class="d-flex" role="search" action="searchProduct.php" method="GET">
              <input class="form-control me-2" type="search" style="border-radius: 50px; width:250px; border:1px solid var(--blue);" placeholder="Search for Products ..." name="search_data">
              <input type="submit" value="Search" class="btn px-4 m-0 submit outline-none" style="border-radius: 50px; border:1px solid var(--blue);" name="search_product">
            </form>
          </ul>

          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto mx-5">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (!isset($_SESSION['username'])) {
                  echo "<i class='fa fa-user'></i> Guest";
                } else {
                  echo"<i class='fa fa-user'></i> ". $_SESSION['username'];
                  // echo"<i class='fa fa-user'></i> My Account";
                }
                ?>
              </a>
              <ul class="dropdown-menu">
                <?php

                if (isset($_SESSION['username'])) {
                  echo ' <li class="dropdown-item">
              <a class="nav-link " href="./user_area/profile.php"> <i class="fa fa-user"></i> My Account</a>
            </li>';}
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
            <li class="nav-item">
              <a class="btn position-relative " href="cart.php"> <i class="fa fa-shopping-cart mx-1"></i>Cart
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mx-1 "><?php cartItemsNumbers(); ?></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-1" href="admin_area\index.php"> <i class="fa fa-shopping-bag icon"></i> Become a Seller</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- Cart function call -->
  <?php cart(); ?>

  <!-- Product Categories -->
  <!-- <h1 class="m-3 text-center text-uppercase"><b>Top Categories to choose from</b></h1> -->
  <!-- <hr class="sctn-line mb-1"> -->
  <div class="container-fluid category-nav bg-light overflow-auto">
    <div class="row flex-nowrap">
      <?php getCategories(); ?>
    </div>
  </div>
  <!-- Hero Section -->
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/images/slide1.webp" class="d-block w-100" alt="Image 1">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/slide2.jpg" class="d-block w-100" alt="Image 2">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/slide3.jpg" class="d-block w-100" alt="Image 3">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/slide4.jpg" class="d-block w-100" alt="Image 4">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




  <!-- Featured Brands -->
  <h1 class="m-3 text-center"><b>Featured Brands</b></h1>
  <hr class="sctn-line mb-1">
  <div class="container-fluid category-nav w-auto overflow-auto">
    <div class="row flex-nowrap">
      <?php
      getbrands();

      ?>
    </div>
  </div>

  <!-- Product Items -->
  <h1 class="m-4 mb-2 text-center "><b> Our Products</b></h1>
  <hr class="sctn-line mb-1">
  <div>
    <div class="row p-1 m-3">
      <div class="col-md-12 mx-auto">
        <div class="row  text-wrap wrap">
          <!-- Fetching products from DB through function -->
          <?php
          getProducts();

          ?>
        </div>
      </div>
    </div>
    <div class="row px-1 mt-3 mx-auto">
      <div class="col-md-10">
        <div class="row">
          <?php
          getUniqueCategories();
          getUniqueBrands();
          // $ip = getIPAddress();
          // echo 'User Real IP Address - ' . $ip;

          ?>
        </div>
      </div>
    </div>

    <?php
    include("./includes/footer.php");
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const texts = [
          "Welcome to IndiMart",
          "Discover the best products at unbeatable prices"
        ];
        let count = 0;
        let index = 0;
        let currentText = '';
        let letter = '';

        (function type() {
          if (count === texts.length) {
            count = 0;
          }
          currentText = texts[count];
          letter = currentText.slice(0, ++index);

          document.getElementById('typewriter-text').textContent = letter;
          if (letter.length === currentText.length) {
            count++;
            index = 0;
            setTimeout(() => {
              document.getElementById('typewriter-text').textContent = '';
              setTimeout(type, 500);
            }, 2000);
          } else {
            setTimeout(type, 100);
          }
        })();
      });
    </script>
</body>

</html>