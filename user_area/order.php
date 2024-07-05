<?php
error_reporting(E_ERROR | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// include("./includes/connection.php");
include("./functions/functions.php");
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
if (isset($_GET["userId"])) {
    $userId = $_GET['userId'];
}

$ip = getIPAddress();
$totalPrice = 0;
$cart_query = "SELECT * FROM `cart` WHERE ip='$ip'";
$invoiceNumber = mt_rand();
$status = "Pending";
$result_cart_price = mysqli_query($con, $cart_query);
$countProducts = mysqli_num_rows($result_cart_price);
while ($rowPrice = mysqli_fetch_array($result_cart_price)) {
    $product_id = $rowPrice["product_id"];
    $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = array($row_product_price["product_price"]);
        $product_value = array_sum($product_price);
        $total_price += $product_values;
    }
}

// Getting quantity from cart
$getCart = "SELECT * FROM `cart`";
$runCart = mysqli_query($con, $getCart);
$getItemQuantity = mysqli_fetch_array($runCart);
$quantity = $getItemQuantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subTotal = $total_price;
} else {
    // $quantity = $quantity;
    $subTotal = $total_price * $quantity;
}
$insert_order = "INSERT  INTO `userorders` (userId,dueAmt,invoiceNumber,totalProducts,orderDate,orderStatus) VALUES($userId,$subTotal,$invoiceNumber,$countProducts,NOW(),'$status')";
$result_query = mysqli_query($con, $insert_order);
if ($result_query) {
    echo "<script>alert('Orders are submitted Sucessfully');</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
// Pending Orders
$status = "Pending";
$insertPendingOrder = "INSERT  INTO `pendingorder` (userId,invoiceNumber,product_id,quantity,orderStatus) VALUES($userId,$invoiceNumber,$product_id,$quantity,'$status')";
$resultPendingOrders = mysqli_query($con, $insertPendingOrder);

// Delete items from cart
$emptyCart="DELETE FROM `cart` WHERE ip='$ip'";
$resultDelete = mysqli_query($con, $emptyCart);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndiMart | Order</title>
</head>

<body>
    <h1>Order</h1>
</body>

</html>