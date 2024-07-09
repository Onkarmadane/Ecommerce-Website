<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $getUser = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($con, $getUser);
    $row_fetch = mysqli_fetch_assoc($result);
    $userId = $row_fetch['userId'];
} else {
    die("User not logged in");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <title>My Orders</title>
    <style>
        .submit {
            background-color: #277A89;
        }

        .subumit:hover {
            background-color: #1f5963;
            transition: ease 1.3s;
            /* color: white; */
        }

        .product-img {
            height: 75px;
            width: 75px;
        }

        .product-details {
            flex: 1;
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .price {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .delivery-status {
            margin-top: 10px;
        }

        .rate-review {
            display: flex;
            align-items: center;
        }

        .rate-review img {
            width: 16px;
            height: 19px;
        }

        .rate-review span {
            margin-left: 0.5rem;
        }
    </style>
</head>

<body>
    <h1 class="text-center">My Orders</h1>
    <hr class="w-75 mx-auto ">
    <div class="container mx-auto">
    <div class="row">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $getOrderDetails = "SELECT * FROM `userorders` WHERE userId=$userId";
        $resultOrders = mysqli_query($con, $getOrderDetails);

        while ($row_orders = mysqli_fetch_assoc($resultOrders)) {
            $orderId = $row_orders['orderId'];
            $totalProducts = $row_orders['totalProducts'];
            $invoiceNumber = $row_orders['invoiceNumber'];
            $orderStatus = $row_orders['orderStatus'];
            if ($orderStatus == "Pending") {
                $orderStatus = "Incomplete";
            } else {
                $orderStatus = "Complete";
            }
            if ($orderStatus == 'Complete') {
                $orderStatus = 'Paid';
            }
            $orderDate = $row_orders['orderDate'];
            $product_title = $row_orders['product_title'];
            $product_price = $row_orders['product_price'];
            $product_img = $row_orders['product_img'];

            echo "
            <div class='container my-4'>
                <div class='card'>
                    <div class='row g-0'>
                        <div class='col-md-2 d-flex align-items-center justify-content-center'>
                            <img src='./admin_area/product_images/$product_img'>
                        </div>
                        <div class='col-md-8 d-flex'>
                            <div class='card-body product-details'>
                                <h5 class='card-title'>$product_title</h5>
                            </div>
                            <div class='col-md-3 mt-4 d-flex'>
                                <p class='text'>Quantity : </p>
                                <p class='text'>$totalProducts</p>
                            </div>
                        </div>
                        <div class='col-md-2 d-flex align-items-center'>
                            <div class='price'>₹$product_price</div>
                        </div>
                        <div class='col-md-12 d-flex mx-3 text-center'>
                            <p class='text'>Invoice Number : </p>
                            <p class='text'> $invoiceNumber</p>&nbsp;&nbsp;&nbsp;&nbsp;
                            <p class='text'>Order Status : </p>
                            <p class='text' style='color: " . ($orderStatus == 'Paid' ? 'green' : 'inherit') .  "'> $orderStatus</p>&nbsp;&nbsp;&nbsp;&nbsp;
                            <p class='text'>Order Date : </p>
                            <p class='text'> $orderDate</p>
                        </div>
                        <div class='rate-review col-md-12 mx-3 mb-3'>
                            <img src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0nMTYnIGhlaWdodD0nMTknIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMTggMTgiPgoJPGcgZmlsbD0nbm9uZSc+CgkJPHBvbHlnb24gaWQ9IlNoYXBlIiBmaWxsPSIjMjg3NEYxIiBwb2ludHM9IjkgMTIuMDYyNSAxMy42Mzc1IDE1LjQzNzUgMTEuODYyNSA5Ljk4NzUgMTYuNSA2LjY4NzUgMTAuODEyNSA2LjY4NzUgOSAxLjA2MjUgNy4xODc1IDYuNjg3NSAxLjUgNi42ODc1IDYuMTM3NSA5Ljk4NzUgNC4zNjI1IDE1LjQzNzUiIC8+CgkJPHBvbHlnb24gaWQ9IlNoYXBlIiBwb2ludHM9IjAgMCAxOCAwIDE4IDE4IDAgMTgiIC8+Cgk8L2c+Cjwvc3ZnPg==' alt='Rate & Review'>
                            <span>Rate &amp; Review Product</span>
                        </div>
                    </div>
                    " . ($orderStatus == 'Incomplete' ? "
                    <button class='submit w-25 mx-2 float-end px-3 py-2 border-0 text-light mb-2 rounded'>
                        <a href='../user_area/confirmPayment.php?orderId=$orderId' class='text-light text-decoration-none '>
                            <i class='fa fa-shopping-cart'></i> Confirm Payment
                        </a>
                    </button>
                    " : "") . "
                </div>
            </div>";
        }
        ?>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>