<?php
include("./includes/connection.php");

function getProducts()
{
    global $con;
    // condition to check isset or not]
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                // $product_id=$row['product_id'];
                $product_title = $row['product_title'];
                $product_desc = $row['product_desc'];
                $product_image1 = $row['pImg1'];
                $product_price = $row['product_price'];
                // $product_key=$row['product_key'];
                $product_category_id = $row['category_id'];
                $product_brand_id = $row['brand_id'];
                echo " <div class='col-md-4 mb-2'>
    <div class='card'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
        <a type='button' class='btn  fa fa-shopping-cart m-1 submit'></a>
        <a type='button' class='btn submit fa fa-bars m-1 '  > More</a>
    </div>
    </div>
  </div>";
            }
        }
    }
}
// getting unique categories
function getUniqueCategories()
{
    global $con;
    // condition to check isset or not]
    if (isset($_GET['category'])) {
        $category_id=$_GET['category'];
        $select_query = "Select * from `products` where category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        // $row=mysqli_fetch_assoc($result_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            // $product_id=$row['product_id'];
            $product_title = $row['product_title'];
            $product_desc = $row['product_desc'];
            $product_image1 = $row['pImg1'];
            $product_price = $row['product_price'];
            // $product_key=$row['product_key'];
            $product_category_id = $row['category_id'];
            $product_brand_id = $row['brand_id'];
            echo " <div class='col-md-4 mb-2'>
    <div class='card'>
      <img src='./admin_area/product_images/$product_image1' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_desc</p>
      <p class='card-text'><b>&#8377;$product_price/-</b></p>
        <a type='button' class='btn  fa fa-shopping-cart m-1 submit'></a>
        <a type='button' class='btn submit fa fa-bars m-1 '  > More</a>
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
    $select_brands = "Select * from `brands`";

    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data["brand_title"];
        $brand_id = $row_data["brand_id"];
        $brand_img = $row_data['brand_img'];
        echo "
        <div class='col-6 col-sm-4 col-md-3 col-lg text-center mb-3'>
          <a href='#' class='d-block'>
            <img src='./admin_area/brand_images/$brand_img' alt='$brand_title' class='img-fluid' style='width:50%; margin: 0 auto;'>
            <span class='d-block mt-2'>$brand_title</span>
          </a>
        </div>";
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
            <a href='#' class='d-block'>
              <img src='./admin_area/category_images/$category_image' alt='$category_title' class='img-fluid' style='width: 100px; height: 100px;'>
              <span class='d-block mt-2'>$category_title</span>
            </a>
          </div>";
    }
}
