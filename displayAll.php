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
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="assets\css\style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./assets/images/logo1.png" alt="" style="height: 50px !important;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active mx-1" aria-current="page" href="Index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="#">Contact Us</a>
                    </li>
                    <form class="d-flex " role="search">
                        <input class="form-control me-2 " type="search" style="border-radius: 50px; width:270px; border:1px solid var(--blue);" placeholder="Search for Products ..." aria-label="Search">
                        <button class="btn px-4 m-0 submit outline-none" type="submit" style="border-radius: 50px;border:1px solid var(--blue); ">Search</button>
                    </form>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fa fa-user" href="#"> Profile</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn position-relative fa fa-shopping-cart mx-auto"> Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mx-auto">
                                1
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fa fa-briefcase" href="#"> Become a Seller</a>
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
                    <a href="#" class="btn  submit btn-hero">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!--product categories -->
    <h1 class="m-3 text-center text-uppercase"><b>Top Categories to choose from</b></h1>
    <hr class="sctn-line mb-1">
    <div class="container-fluid category-nav w-75 overflow-auto">
        <div class="row flex-nowrap">
            <?php
            getCategories();
            ?>
        </div>
    </div>

    <!-- Featured Brands -->
    <h1 class="m-3 text-center text-uppercase"><b>Featured Brands</b></h1>
    <hr class="sctn-line mb-1">
    <div class="container-fluid category-nav w-75 overflow-auto">
        <div class="row flex-nowrap">
            <?php
            getbrands();
            getUniqueBrands();

            ?>
        </div>
    </div>


    <!-- Product Items -->
    <h1 class="m-4 mb-2 text-center text-uppercase "><b>Browse our Products</b></h1>
    <hr class="sctn-line mb-1">
    <div class="row px-1 mt-3 w-75 mx-auto">
        <div class="col-md-10">
            <div class="row">
                <!-- fetching products from DB through function -->
                <?php
                DisplayAllProducts();
                getUniqueCategories();
                ?>
            </div>
        </div>
    </div>

    <?php
    include("./includes/footer.php");
    ?>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>