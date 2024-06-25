<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../assets/images/logo1.png" alt="" style="height: 50px !important;"> </a>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-end " aria-current="page" href="#">Welcome Guest</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-uppercase text-center"><b>Manage Details</b></h1>
    <hr class="m-0 p-0 w-75 mx-auto mb-2">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-center" href="#">
                <div class="m-0 p-0"><img src="../assets/images/admin.png" alt="" style="width: 60%;">
                    <p class="text-center">Admin Name</p>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="index.php?insert_products">Insert Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">View Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="index.php?insert_category">Insert Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">View Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="index.php?insert_brands">Insert Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">View Brands </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">All Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">All Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" aria-current="page" href="#">List Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-info " aria-current="page" href="#">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-2 m-auto">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brands'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['insert_products'])) {
            include('insert_products.php');
        }
        ?>
    </div>
    <!-- Footer -->
    <footer class=" text-white mt-3 pt-4 pb-3" style="background-color: #277A89 !important;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>