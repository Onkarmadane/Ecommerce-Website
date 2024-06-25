<!-- Connecting of php and DB file -->
<?php
include("./includes/connection.php");
include("./functions/functions.php");
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
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-HXR1xQ5zDxd1RfVmiI4UyirRyx30v2uS8QG2gEB3KbhD0BNwbVg6YKd1ecItZJt6B2UVF/e+3SZ1g5QbN/DAmg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
            <li class="nav-item">
              <a class="nav-link " href="#"> <i class="fa fa-user"></i> Profile</a>
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


  <!-- Product Categories -->
  <h1 class="m-3 text-center text-uppercase"><b>Top Categories to choose from</b></h1>
  <hr class="sctn-line mb-1">
  <div class="container-fluid category-nav w-75 overflow-auto">
    <div class="row flex-nowrap">
      <?php getCategories(); ?>
    </div>
  </div>

  <!-- Featured Brands -->
  <h1 class="m-3 text-center text-uppercase"><b>Featured Brands</b></h1>
  <hr class="sctn-line mb-1">
  <div class="container-fluid category-nav w-75 overflow-auto">
    <div class="row flex-nowrap">
      <?php
      getbrands();

      ?>
    </div>
  </div>

  <!-- Product Items -->
  <h1 class="m-4 mb-2 text-center text-uppercase"><b> our Products</b></h1>
  <hr class="sctn-line mb-1">
  <div>
    <div class="row px-1 mt-3 w-75 mx-auto">
      <div class="col-md-10">
        <div class="row">
          <!-- Fetching products from DB through function -->
          <?php
          getProducts();

          ?>
        </div>
      </div>
    </div>
    <div class="row px-1 mt-3 w-75 mx-auto">
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

    <!-- Footer -->
    <footer class="text-white mt-3 pt-4 pb-3" style="background-color: #277A89 !important;">
      <div class="container">
        <div class="row">
          <!-- Company Info -->
          <div class="col-md-4">
            <h5>IndiMart</h5>
            <p>
              1234 Street Name<br>
              City, State, 12345<br>
              Phone: (123) 456-7890<br>
              Email: info@company.com
            </p>
          </div>
          <!-- Quick Links -->
          <div class="col-md-4">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Home</a></li>
              <li><a href="#" class="text-white">Shop</a></li>
              <li><a href="#" class="text-white">About Us</a></li>
              <li><a href="#" class="text-white">Contact</a></li>
            </ul>
          </div>
          <!-- Social Media -->
          <div class="col-md-4">
            <h5>Follow Us</h5>
            <a href="#" class="text-white mr-3"><i class="fa fa-facebook-f"></i></a>
            <a href="#" class="text-white mr-3"><i class="fa fa-twitter"></i></a>
            <a href="#" class="text-white mr-3"><i class="fa fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fa fa-linkedin-in"></i></a>
          </div>
        </div>
        <hr class="bg-white">
        <div class="row">
          <div class="col text-center">
            <p class="mb-0">&copy; 2024 IndiMart. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>

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