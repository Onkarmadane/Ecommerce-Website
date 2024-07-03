<?php
include("./includes/connection.php");

function getProducts()
{
  global $con;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      if ($num_of_rows == 0) {
        echo "<script>alert('No Stock For This Category');</script>";
        echo "<script>window.open('index.php', '_self')</script>";
      }
      if ($result_query) {
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_desc = $row['product_desc'];
          $product_image1 = $row['pImg1'];
          $product_price = $row['product_price'];

          echo " <div class='col-md-4 mb-2'>
    <div class='card h-100'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <i class='fa-solid fa-barcode'></i>
      <p class='card-text'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
        <a type='button' href='index.php?addToCart=$product_id' class='btn  fa fa-shopping-cart m-1 btn-warning'></a>
        <a type='button' class='btn  btn-success  m-1 '  href='#'> <i class='fa fa-tag'></i> Buy Now</a>
    </div>
    </div>
  </div>";
        }
      }
    }
  }
}

// getting unique categories
function getUniqueCategories()
{
  global $con;

  //condition to check is set or not
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM products WHERE category_id = $category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<script>alert('No Stock For This Category');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_desc = $row['product_desc'];
      $product_image1 = $row['pImg1'];
      $product_price = $row['product_price'];

      echo " <div class='col-md-4 mb-2 w-75'>
    <div class='card'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text' style='text-align:justify;'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
       <a type='button' href='index.php?addToCart=$product_id' class='btn  fa fa-shopping-cart m-1 btn-warning'></a>
         <a type='button' class='btn  btn-success fa fa-tag m-1 '  href='#'> Buy Now</a>
    </div>
    </div>
  </div>";
    }
  }
}


// Displaying brands
function getBrands()
{
  global $con;
  $select_brands = "SELECT * FROM brands";
  $result_brands = mysqli_query($con, $select_brands);

  if ($result_brands) {
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      $brand_img = $row_data['brand_img'];

      // Display each brand with a link to get products for that brand
      echo "
        <div class='col-6 col-sm-4 col-md-3 col-lg text-center mb-3'>
          <a href='index.php?brand=$brand_id' class='d-block'>
            <img src='./admin_area/brand_images/$brand_img' alt='$brand_title' class='img-fluid' style='width:50%; margin: 0 auto;'>
            <span class='d-block mt-2'>$brand_title</span>
          </a>
        </div>";
    }
  }
}

// Function to fetch and display products for a specific brand
function getUniqueBrands()
{
  global $con;

  // Check if brand parameter is set in the URL
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);

    // If no products found for the brand
    if ($num_of_rows == 0) {
      echo "<script>alert('No Stock For This Brand ');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
      // Display products after the "Browse our Products" heading
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_image1 = $row['pImg1'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];

        echo "<div class='col-md-4 mb-2'>
    <div class='card'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text' style='text-align:justify;'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
       <a type='button' href='index.php?addToCart=$product_id' class='btn  fa fa-shopping-cart m-1 btn-warning'></a>
        <a type='button' class='btn  btn-success fa fa-tag m-1 '  href='#'> Buy Now</a>
    </div>
    </div>
  </div>";
      }

      echo "</div>"; // Close row div
    }
  }
}

// Displaying Categories
function getCategories()
{
  global $con;
  $select_categories = "SELECT * FROM `categories`";

  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data["category_title"];
    $category_id = $row_data["category_id"];
    $category_image = $row_data['category_img'];
    echo "<div class='col-6 col-sm-4 col-md-3 col-lg text-center mb-3'>
            <a href='index.php?category=$category_id' class='d-block'>
              <img src='./admin_area/category_images/$category_image' alt='$category_title' class='img-fluid' style='width: 100px; height: 100px;'>
              <span class='d-block mt-2'>$category_title</span>
            </a>
          </div>";
  }
}

function getCategoriesSearch()
{
  global $con;
  $select_categories = "SELECT * FROM `categories`";

  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data["category_title"];
    $category_id = $row_data["category_id"];
    // $category_image = $row_data['category_img'];
    echo "<div class='col-6 col-sm-4 col-md-3 col-lg text-center mb-3 bg-light'>
            <a href='index.php?category=$category_id' class='d-block'>
              
              <span class='d-block mt-2'>$category_title</span>
            </a>
          </div>";
  }
}

function DisplayAllProducts()
{
  global $con;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "SELECT * FROM products ORDER BY RAND()";
      $result_query = mysqli_query($con, $select_query);

      if ($result_query) {
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_desc = $row['product_desc'];
          $product_image1 = $row['pImg1'];
          $product_price = $row['product_price'];

          echo " <div class='col-md-4 mb-2'>
    <div class='card'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text' style='text-align:justify;'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
       <a type='button' href='index.php?addToCart=$product_id' class='btn  fa fa-shopping-cart m-1 btn-warning'></a>
         <a type='button' class='btn  btn-success fa fa-tag m-1 '  href='#'> Buy Now</a>
    </div>
    </div>
  </div>";
        }
      }
    }
  }
}

function searchProducts()
{
  global $con;
  if (isset($_GET["search_product"])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from `products` where  product_key like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<div class='text-center'><h1 class='text-center w-75 text-danger'>No Result Matched, No Product found for this category</h2></div>";
    }
    if ($result_query) {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['pImg1'];
        $product_price = $row['product_price'];

        echo " <div class='col-md-4 mb-2'>
  <div class='card'>
    <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
    <div class='card-body'>
    <h5 class='card-title' style='text-align:justify;'>$product_title</h5>
    <p class='card-text'>$product_desc</p>
    <p class='card-text'><b>&#8377;$product_price/-</b></p>
     <a type='button' href='index.php?addToCart=$product_id' class='btn  fa fa-shopping-cart m-1 btn-warning'></a>
      <a type='button' class='btn  btn-success fa fa-tag m-1 '  href='#'> Buy Now</a>
  </div>
  </div>
</div>";
      }
    }
  }
}

// GET IP
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
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// CART
function cart()
{
  if (isset($_GET['addToCart'])) {
    global $con;
    $ip = getIPAddress();
    $getProductId = $_GET['addToCart'];

    // Check if the product is already in the cart
    $select_query = $con->prepare("SELECT * FROM cart WHERE ip = ? AND product_id = ?");
    $select_query->bind_param("si", $ip, $getProductId);
    $select_query->execute();
    $result_query = $select_query->get_result();
    $num_of_rows = $result_query->num_rows;

    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present in cart');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
      // Insert the product into the cart
      $insert_query = $con->prepare("INSERT INTO cart (product_id, ip, quantity) VALUES (?, ?, 0)");
      $insert_query->bind_param("is", $getProductId, $ip);
      $insert_query->execute();
      echo "<script>alert('This item is Added to Cart');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

// Function to get cart item number
function cartItemsNumbers()
{
  if (isset($_GET["addToCart"])) {
    global $con;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM `cart` WHERE ip = '$ip'";
    $result_query = mysqli_query($con, $select_query);
    $CountCartItems = mysqli_num_rows($result_query);
  } else {
    global $con;
    $ip = getIPAddress();
    $select_query  = "SELECT * FROM `cart` WHERE ip = '$ip'";
    $result_query = mysqli_query($con, $select_query);
    $CountCartItems = mysqli_num_rows($result_query);
  }
  echo $CountCartItems;
}

// function totalCartPrice()
// {
//   global $con;
//   $ip = getIPAddress();
//   $total_price = 0; // Initialize the total_price variable

//   $cart_query = "SELECT * FROM `cart` WHERE ip='$ip'";
//   $result_query = mysqli_query($con, $cart_query);

//   if (!$result_query) {
//     die("Cart Query Failed: " . mysqli_error($con));
//   }

//   while ($row = mysqli_fetch_array($result_query)) {
//     $product_id = $row['product_id'];
//     $quantity = $row['quantity'];
//     $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
//     $result_products = mysqli_query($con, $select_product);

//     if (!$result_products) {
//       die("Product Query Failed: " . mysqli_error($con));
//     }

//     while ($row_products_price = mysqli_fetch_array($result_products)) {
//       $product_price = $row_products_price['product_price']; // Assuming 'product_price' is the column name in your products table
//       $product_title = $row_products_price['product_title'];
//       $product_desc = $row_products_price['product_desc'];
//       $pImg = $row_products_price['pImg1'];
      
//       $product_values = $product_price * $quantity; // Calculate the total price for this product based on quantity
//       $total_price += $product_values;

      // echo "<div class='container'>
      //           <div class='row'>
      //               <div class='col-12'>
      //                   <div class='card mb-4'>
      //                       <div class='card-body'>
      //                           <div class='row'>
      //                               <div class='col-4 col-md-2'>
      //                                   <img loading='lazy' class='img-fluid' alt='$product_title' src='./admin_area/product_images/$pImg' style='width:100% !important;  object-fit:cover;'>
      //                               </div>
      //                               <div class='col-8 col-md-10'>
      //                                   <div>
      //                                       <p class='text-black'>$product_title</p>
                                            
      //                                   </div>
      //                                   <p class='text-black'>$product_desc</p>
      //                                   <div class='d-flex justify-content-between align-items-center'>
                                           
      //                                   </div>
      //                                   <div class='mt-3'>
      //                                       Delivery by Fri Jun 28 | <span class='text-success'>Free</span>
      //                                   </div>
      //                               </div>
      //                           </div>
      //                           <div class='d-flex justify-content-between align-items-center mt-3'>
      //                               <div class='d-flex align-items-center'>
      //                                   <button class='btn btn-outline-secondary minus-btn' data-id='$product_id'> – </button>
      //                                   <input type='text' class='form-control input-quantity mx-2' id='quantity_$product_id' value='$quantity'>
      //                                   <button class='btn btn-outline-secondary plus-btn' data-id='$product_id'> + </button> &nbsp;
      //                                   <button class='btn btn-warning p-3'><i class='fa fa-arrows-rotate'></i> Update</button>
      //                               </div>
      //                               <div>
      //                                   <button class='btn btn-danger p-3 remove-btn' data-id='$product_id'><i class='fa fa-trash'></i> Remove</button>
      //                               </div>
      //                           </div>
      //                       </div>
      //                       <div class='card-body'>
      //                           <h5 class='card-title'>Price details</h5>
      //                           <div class='d-flex justify-content-between'>
      //                               <div><b>&#8377;$product_price/-</b></div>
                                   
      //                           </div>
                               
      //                           <div class='d-flex justify-content-between'>
      //                               <div>Delivery Charges</div>
      //                               <div class='text-success'>Free</div>
      //                           </div>
      //                           <div class='d-flex justify-content-between total-amount'>
      //                               <div>Total Amount</div>
      //                               <div><b>&#8377;$product_price/-</b></div>
      //                           </div>
                                
      //                       </div>
      //                       <div class='card-body'>
      //                           <form method='post' action='#'>
      //                               <input type='hidden' name='domain' value='physical'>
      //                               <button class='btn btn-success p-3'><i class='fa fa-shopping-cart'></i> Place Order</button>
      //                               <button class='btn text-white p-3' style='background-color:#0097B2;'><i class='fa fa-shopping-bag'></i> Continue Shopping</button>
      //                           </form>
      //                       </div>
      //                   </div>
      //               </div>
      //           </div>
      //       </div>";
//     }
//   }
// }

function total_price()
{
    global $con;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart` where ip='$ip'";
    $result = mysqli_query($con,$cart_query);
    while($row = mysqli_fetch_array($result))
    {
        $product_id = $row['product_id'];
        $select_products = "Select * from `products` where product_id = '$product_id'";
        $result_product = mysqli_query($con,$select_products);
        while($row_product_price = mysqli_fetch_array($result_product))
        {
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details()
 {
    global $con;
    $username = $_SESSION['username'];
 $get_details="Select * from `user_table` where user_name='$username'";
     $result_query = mysqli_query($con,$get_details);
     while($row_query=mysqli_fetch_array($result_query))
     {
         $user_id=$row_query['user_id'];
         if(!isset($_GET['edit_account']))
       {
             if(!isset($_GET['my_orders']))
             {
                 if(!isset($_GET['delete_account']))
                 {
                     $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='Pending'";
                     $result_order_query=mysqli_query($con,$get_orders);
                     $row_count_query=mysqli_num_rows($result_order_query);
                   if($row_count_query>0)
                     {
                         echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                       <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";                                
                     }
                   else
                     {
                         echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                         <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";
                    }
                 }
             }
     }
     }
 }
   if (!function_exists('get_user_order_details')) {
    function get_user_order_details() {
        global $con;
        
        // Check if the session username is set
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            // Prepare and execute query to get user details
            $get_details = "SELECT * FROM user_table WHERE user_name='$username'";
            $result_query = mysqli_query($con, $get_details);
            
            // Check if query executed successfully
            if($result_query) {
                // Fetch user details
                $row_query = mysqli_fetch_array($result_query);
                $user_id = $row_query['user_id'];
                
                // Check if edit_account, my_orders, and delete_account parameters are not set
                if(!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
                    // Prepare and execute query to get pending orders
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='Pending'";
                    $result_order_query = mysqli_query($con, $get_orders);
                    
                    // Check if query executed successfully
                    if($result_order_query) {
                        $row_count_query = mysqli_num_rows($result_order_query);
                        
                        // Display pending orders count and links accordingly
                        if($row_count_query == 0) {
                            echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                            <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";                                
                        } else {
                            echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($con); // Display error if query fails
                    }
                }
            }
        }
    }
}

?>
