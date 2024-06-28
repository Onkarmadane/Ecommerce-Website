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
    <title>Ecommarce Website - Cart Details</title>
    <!--Custom stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .cart_image
        {
            width: 80px;
            height: 80px;
            object-fit: contain;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- First Child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-success navbar-light">
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--Second Child-->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <ul class="navbar-nav me-auto">
            <?php
                //showing user name
                if(!isset($_SESSION['username']))
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='#' class='nav-link'>Welcome Guest</a>
                        </li>";
                }
                else
                {
                    echo "<li class='navbar-item' style='font-weight: bold;'>
                            <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
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

    <!-- Fourth Child - Table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <tbody>
                            <!-- PHP Code to display dynamic data -->
                            <?php
                                global $connect;
                                $ip_address = getIPAddress();
                                $total_price = 0;
                                $cart_query = "Select * from `cart_details` where ip_address='$ip_address'";
                                $result = mysqli_query($connect,$cart_query);
                                $result_count=mysqli_num_rows($result);
                                if($result_count>0)
                                {
                                    echo "<thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Remove</th>
                                                <th colspan='2'>Operations</th>
                                            </tr>
                                        </thead>";
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $product_id = $row['product_id'];
                                        $select_products = "Select * from `products` where product_id ='$product_id'";
                                        $result_product = mysqli_query($connect,$select_products);
                                        while($row_product_price = mysqli_fetch_array($result_product))
                                        {
                                            $product_price=array($row_product_price['product_price']);
                                            $price_table=$row_product_price['product_price'];
                                            $product_title=$row_product_price['product_title'];
                                            $product_image=$row_product_price['product_image1'];
                                            $product_values=array_sum($product_price);
                                            $total_price+=$product_values;
                                            ?>
                                            <tr>
                                                <td><?php echo $product_title?></td>
                                                <td><img src="./Images/<?php echo $product_image ?>" class="cart_image"></td>
                                                <td><input type="text" name="qty" class="form-input w-50"></td>
                                                <?php
                                                    $ip_address = getIPAddress();
                                                    if(isset($_POST['update_cart']))
                                                    {
                                                        $quantities=$_POST['qty'];
                                                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip_address'";
                                                        $result_quantity = mysqli_query($connect,$update_cart);
                                                        $total_price = $total_price * $quantities;
                                                    }
                                                ?>
                                                <td><?php echo $price_table ?>/-</td>
                                                <td><input type="checkbox" name="remove[]" value="<?php echo $product_id ?>"></td>
                                                <td>
                                                    <!-- <button class="px-2 py-1 bg-info">Update Cart</button> -->
                                                    <input type="submit" value="Update Cart" class="px-2 py-1 bg-success text-light" name="update_cart">
                                                    <!-- <button class="px-2 py-1 bg-info">Remove Item</button> -->
                                                    <input type="submit" value="Remove Item" class="px-2 py-1 bg-success text-light" name="remove_item">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                else
                                {
                                    echo "<h2 class='text-danger text-center'>Cart is empty</h2>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- Subtotal -->
                    <div class="d-flex mb-5 mt-1">
                        <?php
                            global $connect;
                            $ip_address = getIPAddress();
                            // $total_price = 0;
                            $cart_query = "Select * from `cart_details` where ip_address='$ip_address'";
                            $result = mysqli_query($connect,$cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0)
                            {
                                echo "<h4 class='px-4'>Subtotal :<strong class='text-danger'>$total_price/-</strong></h4>
                                <input type='submit' value='Continue Shopping' class='bg-dark text-light px-3 py-2 border-0 ms-3' name='continue_shopping'>
                                <button class='bg-secondary px-3 py-2 border-0 ms-3 text-light'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                            }
                            else
                            {
                                echo "<input type='submit' value='Continue Shopping' class='bg-dark text-light px-3 py-2 border-0 ms-3' name='continue_shopping'>";
                            }
                            if(isset($_POST['continue_shopping']))
                            {
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
        <!-- Function to remove item -->
        <?php
            function remove_cart_item()
            {
                global $connect;
                if (isset($_POST['remove_item']))
                {
                    foreach($_POST['remove'] as $remove_id)
                    {
                        echo $remove_id;
                        $delete_query="Delete from `cart_details` where product_id=$remove_id";
                        $run_delete = mysqli_query($connect,$delete_query);
                        if($run_delete)
                        {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }

            }
            echo $remove_item = remove_cart_item();
        ?>
    
    <!-- Including Footer -->
    <?php
        include ("./includes/footer.php");
    ?>
    
    <!--Bootstrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>