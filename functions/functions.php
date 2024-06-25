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
        echo "<h1 class='text-center w-75 text-danger mx-auto'>No Stock for this category</h1>";
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
      <h5 class='card-title'>$product_title</h5>
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
}

// function getProducts()
// {
//     global $con;
//     if (!isset($_GET['category']) && !isset($_GET['brand'])) {
//         $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
//         $result_query = mysqli_query($con, $select_query);

//         if ($result_query) {
//             while ($row = mysqli_fetch_assoc($result_query)) {
//                 $product_id = $row['product_id'];
//                 $product_title = $row['product_title'];
//                 $product_desc = $row['product_desc'];
//                 $product_price = $row['product_price'];
//                 // Fetch all images for the current product
//                 $images_sql = "SELECT image_path FROM product_images WHERE product_id = $product_id";
//                 $images_result = mysqli_query($con, $images_sql);
//                 $images = [];
//                 while ($image_row = mysqli_fetch_assoc($images_result)) {
//                     $images[] = $image_row['image_path'];
//                 }

//                 echo "<div class='col-md-4 mb-2'>
//                         <div class='card'>
//                             <div id='carousel$product_id' class='carousel slide' data-ride='carousel'>
//                                 <div class='carousel-inner'>";

//                 // Generate carousel items
//                 foreach ($images as $index => $image) {
//                     $active = ($index === 0) ? 'active' : '';
//                     echo "<div class='carousel-item $active'>
//                             <img src='./admin_area/product_images/$image' class='d-block w-100' alt='$product_title'>
//                           </div>";
//                 }

//                 echo "          </div>
//                                 <a class='carousel-control-prev' href='#carousel$product_id' role='button' data-slide='prev'>
//                                     <span class='carousel-control-prev-icon' aria-hidden='true'></span>
//                                     <span class='sr-only'>Previous</span>
//                                 </a>
//                                 <a class='carousel-control-next' href='#carousel$product_id' role='button' data-slide='next'>
//                                     <span class='carousel-control-next-icon' aria-hidden='true'></span>
//                                     <span class='sr-only'>Next</span>
//                                 </a>
//                             </div>
//                             <div class='card-body'>
//                                 <h5 class='card-title'>$product_title</h5>
//                                 <p class='card-text'>$product_desc</p>
//                                 <p class='card-text'><b>&#8377;$product_price/-</b></p>
//                                 <a type='button' class='btn btn-primary fa fa-shopping-cart m-1 submit'></a>
//                                 <a type='button' class='btn btn-secondary submit fa fa-bars m-1'>Buy Now</a>
//                             </div>
//                         </div>
//                     </div>";
//             }
//         }
//     }
// }

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
      echo "<h1 class='text-center w-75 text-danger mx-auto'>No Stock for this category</h1>";
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
      echo "<h1 class='text-center w-75 text-danger mx-auto '>No Products available for this brand</h1>";
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
      <p class='card-text'>$product_desc</p>
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
    <h5 class='card-title'>$product_title</h5>
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
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// CART
function cart(){
  if(isset($_GET['addToCart'])) {
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
function cartItemsNumbers(){
 if(isset($_GET["addToCart"])) {
global $con;
$ip= getIPAddress();
$select_query = "SELECT * FROM `cart` WHERE ip = '$ip'";
$result_query = mysqli_query( $con, $select_query );
$CountCartItems = mysqli_num_rows( $result_query );
 }else{
  global $con;
  $ip= getIPAddress();
  $select_query  = "SELECT * FROM `cart` WHERE ip = '$ip'";
  $result_query = mysqli_query( $con, $select_query );
  $CountCartItems = mysqli_num_rows( $result_query );
  
}
echo $CountCartItems;
} 