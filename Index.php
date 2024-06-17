<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IndiMart | Home</title>
  <link rel="icon" type="image/x-icon" href="./assets/images/logo1.png">
  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="assets\css\style.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./assets/images/logo1.png" alt="" style="height: 50px !important;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active mx-1" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="#">Contact Us</a>
          </li>
          <form class="d-flex " role="search">
            <input class="form-control me-2" type="search" placeholder="Search for Products ..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fa fa-user" href="#"> Profile</a>
          </li>
          <li class="nav-item mx-2">
            <a class="btn  position-relative fa fa-shopping-cart mx-auto"> Cart
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mx-auto">
                1
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 hero-content">
          <h1>Welcome to IndiMart</h1>
          <p>Discover the best products at unbeatable prices</p>
          <a href="#" class="btn btn-primary btn-hero">Shop Now</a>
        </div>
      </div>
    </div>
  </section>

  <h1 class="m-3 text-center text-uppercase"><b>Top Categories to choose from</b></h1>
  <hr class="sctn-line mb-5">
  <div class="container-fluid category-nav w-75">
    <div class="row">
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/offer.webp" alt="Electronics">
          <span class="d-block">Offer</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/mobiles.webp" alt="Clothing">
          <span class="d-block">Mobiles</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/tv&applicances.webp" alt="Home & Kitchen">
          <span class="d-block">Tv & Appilances</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/electronics.webp" alt="Home & Kitchen">
          <span class="d-block">Electronics</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/fashion.webp" alt="Home & Kitchen">
          <span class="d-block">Fashion</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/beauty.webp" alt="Beauty">
          <span class="d-block">Beauty</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/homeKitchen.webp" alt="Home & Kitchen">
          <span class="d-block">Home & Kitchen</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/furniture.webp" alt="Home & Kitchen">
          <span class="d-block">Furniture</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/travel.webp" alt="Home & Kitchen">
          <span class="d-block">Travel</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-3 col-lg">
        <a href="#">
          <img src="./assets/images/grocery.webp" alt="Home & Kitchen">
          <span class="d-block">Grocery</span>
        </a>
      </div>
    </div>
  </div>
  <!-- Product Items -->
  <div class="card-group">
    <div class="card">
      <img src="./assets/images/Apple-more.jpg" class="card-img-top" alt="c.jpg">
      <div class="card-body">
        <h5 class="card-title">Flexible Learning</h5>
        <p class="card-text">Learn at your own pace, move between multiple courses, or switch to a different course
        <p class="card-text"></p>
        <button type="button" class="btn btn-primary fa fa-shopping-cart"> Add To cart</button>
        <button type="button" class="btn btn-primary fa fa-bars"> View More</button>
      </div>
    </div>
    <div class="card">
      <img src="./assets/images/biryani1.jpg" class="card-img-top" alt="c++.jpg">
      <div class="card-body">
        <h5 class="card-title">Unlimited Certificates</h5>
        <p class="card-text">Earn a certificate for every learning program that you complete at no additional cost</p>
        <p class="card-text"></p>
        <button type="button" class="btn btn-primary fa fa-shopping-cart"> Add To cart</button>
        <button type="button" class="btn btn-primary fa fa-bars"> View More</button>
      </div>
    </div>
    <div class="card">
      <img src="./assets/images/book.jpg" class="card-img-top" alt="python">
      <div class="card-body">
        <h5 class="card-title">Saves Money</h5>
        <p class="card-text">Spend less money on your learning if you plan to take multiple courses this year</p>
        <p class="card-text"></p>
        <button type="button" class="btn btn-primary fa fa-shopping-cart"> Add To cart</button>
        <button type="button" class="btn btn-primary fa fa-bars"> View More</button>

      </div>
    </div>
    <div class="card">
      <img src="./assets/images/biryani2.jpg" class="card-img-top" alt="python">
      <div class="card-body">
        <h5 class="card-title">Learn Anything</h5>
        <p class="card-text">Explore any interest or trending topic, take prerequisites, and advance your skills</p>
        <button type="button" class="btn btn-primary fa fa-shopping-cart"> Add To cart</button>
        <button type="button" class="btn btn-primary fa fa-bars"> View More</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class=" text-white mt-3 pt-4 pb-3" style="background-color: #0097B2 !important;">
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

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>