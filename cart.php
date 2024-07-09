<!-- coning of php and DB file -->
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
    <title>IndiMart | Cart</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo1.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto mx-5">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (!isset($_SESSION['username'])) {
                                    echo "<i class='fa fa-user'></i> Guest";
                                } else {
                                    echo "<i class='fa fa-user'></i> " . $_SESSION['username'];
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
    <!-- Cart function call -->
    <?php cart(); ?>

    <!-- PHP CODE to display dynamic data -->
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <h1 class="text-center text text-uppercase" style="color:#277A89"><b>Your Cart</b></h1>
                <hr class="w-75 mx-auto">
                <table class="table table-bordered text-center mt-5">
                    <tbody>
                        <!-- PHP Code to display dynamic data -->
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart` where ip='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
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
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id ='$product_id'";
                                $result_product = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_product)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_desc = $row_product_price['product_desc'];
                                    $product_image = $row_product_price['pImg1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;
                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image ?>" class="cart_image p-0 m-0 w-50"></td>
                                        <td><input type="text" name="qty" class="form-input w-50"></td>
                                        <?php
                                        $ip_address = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantity = $_POST['qty'];
                                            $update_cart = "update `cart` set quantity=$quantity where ip='$ip'";
                                            $result_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantity;
                                        }
                                        ?>
                                        <td><?php echo "&#8377;" . $price_table ?>/-</td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <!-- <button class="px-2 py-1 bg-info">Update Cart</button> -->
                                            <input type="submit" value="Update Cart" class='submit px-3 py-2 m-1 border-0 ms-3 text-light' style='border-radius:15px;' name="update_cart">
                                            <!-- <button class="px-2 py-1 bg-info">Remove Item</button> -->
                                            <input type="submit" value="Remove Item" class="px-2 py-1 btn m-1 bg-light btn text-dark" name="remove_cart" style="border-radius:15px;outline:#277A89 1px solid">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-danger text-center'>Cart is empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Subtotal -->
                <div class="d-flex mb-5 mt-1">
                    <?php
                    global $con;
                    $ip_address = getIPAddress();
                    // $total_price = 0;
                    $cart_query = "Select * from `cart` where ip='$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-4'>Subtotal :<strong class='text-danger'>&#8377;$total_price/-</strong></h4>
                                
                                 <button class='btn text-black p-3' type='submit'name='continue_shopping'  value='Continue Shopping' style='outline:#277A89 1px solid ;border-radius:15px;'><i class='fa fa-shopping-bag'></i> Continue Shopping</button>
                                <button class='submit px-3 py-2 border-0 ms-3 text-light' style='border-radius:15px;'><a href='./user_area/checkout.php' class='text-light text-decoration-none ' ><i class='fa fa-shopping-cart'></i> Checkout</a></button>";
                    } else {
                        echo "<button class='btn text-black p-3' type='submit'name='continue_shopping'  value='Continue Shopping' style='outline:#277A89 1px solid ;border-radius:15px;'><i class='fa fa-shopping-bag'></i> Continue Shopping</button>";
                        // <input type='submit' value='Continue Shopping' class='bg-dark text-light px-3 py-2 border-0 ms-3' name='continue_shopping'>
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                </div>
        </div>
    </div>
    </form>
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from `cart` where product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>
    <!-- <div class='container'>
                <div class='row'>
                    <div class='col-12'>
                        <div class='card mb-4'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-4 col-md-2'>
                                        <img loading='lazy' class='img-fluid p-3' alt='$product_title' src='./admin_area/product_images/<?php echo $product_image ?>' style='width:100% !important;  '>
                                    </div>
                                    <div class='col-8 col-md-10'>
                                        <div>
                                            <p class='text-black'><?php echo $product_title ?></p>
                                            
                                        </div>
                                        <p class='text-black'><?php echo  $product_desc ?></p>
                                        <div class='d-flex justify-content-between align-items-center'>
                                           
                                        </div>
                                        <div class='mt-3'>
                                            Delivery by Fri Jun 28 | <span class='text-success'>Free</span>
                                        </div>
                                    </div>
                                </div>
                                <div class='d-flex justify-content-between align-items-center mt-3'>
                                    <div class='d-flex align-items-center'>
                                        <button class='btn btn-outline-secondary minus-btn' data-id='$product_id'> – </button>
                                        <input type='text' class='form-control input-quantity mx-2' id='quantity_$product_id' value='$quantity'>
                                        <button class='btn btn-outline-secondary plus-btn' data-id='$product_id'> + </button> &nbsp;
                                        <button class='btn btn-warning p-3'><i class='fa fa-arrows-rotate'></i> Update</button>
                                    </div>
                                    <div>
                                        <button class='btn btn-danger p-3 remove-btn' data-id='$product_id'><i class='fa fa-trash'></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>Price details</h5>
                                <div class='d-flex justify-content-between'>
                                    <div><b><?php echo "&#8377;" . $price_table . "/-" ?></b></div>
                                   
                                </div>
                               
                                <div class='d-flex justify-content-between'>
                                    <div>Delivery Charges</div>
                                    <div class='text-success'>Free</div>
                                </div>
                                <div class='d-flex justify-content-between total-amount'>
                                    <div>Total Amount</div>
                                    <div><b class="text-right"><?php echo "&#8377;" . $price_table . "/-" ?></div>
                                </div>
                                
                            </div>
                            <div class='card-body'>
                                <form method='post' action='#'>
                                    <input type='hidden' name='domain' value='physical'>
                                    <button class='btn btn-success p-3'><i class='fa fa-shopping-cart'></i> Place Order</button>
                                    <button class='btn text-white p-3' style='background-color:#0097B2;'><i class='fa fa-shopping-bag'></i> Continue Shopping</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cards = document.querySelectorAll(".card");
            cards.forEach(function(card) {
                // Save the original inline styles (if any)
                card.dataset.originalStyle = card.getAttribute('style');

                // Remove hover effect and apply as inline style
                card.addEventListener('mouseenter', function() {
                    this.style.filter = 'none';
                    this.style.transition = 'none';
                    this.style.transform = 'none';
                });

                // Restore original styles on mouse leave
                card.addEventListener('mouseleave', function() {
                    if (this.dataset.originalStyle) {
                        this.setAttribute('style', this.dataset.originalStyle);
                    } else {
                        this.removeAttribute('style');
                    }
                });
            });
        });
    </script>
    <!-- <script>
                function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}
            </script> -->
</body>

</html>