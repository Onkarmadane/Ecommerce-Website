<?php
    include ("includes/connect.php");
    include ("functions/common_function.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommarce Website</title>
    <!--Custom stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body
    {
        overflow-x: hidden;
    }
</style>
<body>
    <!-- First Child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info navbar-light">
            <div class="container-fluid">
                <img src="Images/logo.png" class="logo">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-weight: 500;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fa-solid fa-cart-shopping">
                                <sup><?php cart_item();?></sup>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_price(); ?>/-</a>
                        </li>
                    </ul>
                        <form class="d-flex" role="search" action="" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                            <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                            <input type="submit" value="Search" class="bg-info border-light text-light p-2" style="border-radius:10%; width:100px;" name="search_data">
                        </form>
                </div>
            </div>
        </nav>
    </div>
    <!--Second Child-->
    <div class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <ul class="navbar-nav me-auto">
            <?php
                //showing user name
                if(!isset($_SESSION['username']))
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='user_area/profile.php' class='nav-link'>Welcome Guest</a>
                        </li>";
                }
                else
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='user_area/profile.php' class='nav-link'>Welcome ".$_SESSION['username']."</a>
                        </li>";
                }
                //login logout
                if(!isset($_SESSION['username']))
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='user_area/user_login.php' class='nav-link'>Login</a>
                        </li>";
                }
                else
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='user_area/logout.php' class='nav-link'>Logout</a>
                        </li>";
                }
            ?>
        </ul>
    </div>
    <!--Third Child-->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community.</p>
    </div>
    <!--Fourth Child-->
    <div class="row">
        <div class="col-md-10">
            <!--Products-->
            <div class="row">
                <!-- Fetching Products -->
                <?php
                    search_product();
                    get_unique_categories();
                    get_unique_brand();
                    cart();
                ?>    
            </div>
        </div>
        <div class="col-md-2 bg-secondary p-0">
            <ul class="navbar-nav me-auto pb-4 text-center">
                <li class="navbar-item bg-info pb-4" style="list-style:none; height: 40px; margin-bottom:10px;">
                    <a href="#" class="nav-link text-light mb-5 text-center"><h4>Delivery Brands</h4></a>
                </li>
                <?php
                    $select_brands = "Select * from `brands`";
                    $result_brands = mysqli_query($connect,$select_brands);
                    while($row_data=mysqli_fetch_assoc($result_brands))
                    {
                        $brand_title=$row_data['brand_title'];
                        $brand_id=$row_data['brand_id'];

                        echo "<li class='navbar-item' style='list-style:none; height: 30px; margin-bottom:5%;'>
                                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                            </li>";
                    }
                ?>
            </ul>
            <ul class="navbar-nav me-auto p-0 text-center">
                <li class="navbar-item bg-info" style="list-style:none; height: 40px;margin-bottom:10px;">
                    <a href="#" class="nav-link text-center text-light mb-5"><h4>Categories</h4></a>
                </li>
                <?php
                    $select_categories = "Select * from `categories`";
                    $result_categories = mysqli_query($connect,$select_categories);
                    // $row_data=mysqli_fetch_assoc($result_categories);
                    // echo $row_data['category_title'];
                    while($row_data=mysqli_fetch_assoc($result_categories))
                    {
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
        
                        echo "<li class='navbar-item' style='list-style:none; height: 30px; margin-bottom:10px;'>
                                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                            </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    
    <!-- Including Footer -->
    <?php
        include ("./includes/footer.php");
    ?>
    
    <!--Bootstrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>