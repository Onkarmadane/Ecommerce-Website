<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../includes/connection.php");

if (isset($_POST["insert_product"])) {
  $product_title = $_POST['product_title'];
  $product_desc = $_POST['product_desc'];
  $product_key = $_POST['product_key'];
  $product_category = $_POST['product_category'];
  $product_brand = $_POST['product_brands'];
  $product_price = $_POST['product_price'];
  $product_status = "true";

  // Accessing Images
  $pImg1 = $_FILES['pImg1']['name'];
  $pImg2 = $_FILES['pImg2']['name'];
  $pImg3 = $_FILES['pImg3']['name'];

  // Accessing Image Temp Names
  $temp_pImg1 = $_FILES['pImg1']['tmp_name'];
  $temp_pImg2 = $_FILES['pImg2']['tmp_name'];
  $temp_pImg3 = $_FILES['pImg3']['tmp_name'];

  // Checking empty condition 
  if (empty($product_title) || empty($product_desc) || empty($product_key) || empty($product_category) || empty($product_brand) || empty($pImg1) || empty($pImg2) || empty($pImg3)) {
    echo "<script>alert('Please fill out all the mandatory fields')</script>";
    exit();
  } else {
    // Moving uploaded files
    if (!move_uploaded_file($temp_pImg1, "./product_images/$pImg1")) {
      echo "<script>alert('Error uploading Product Image 1')</script>";
      exit();
    }
    if (!move_uploaded_file($temp_pImg2, "./product_images/$pImg2")) {
      echo "<script>alert('Error uploading Product Image 2')</script>";
      exit();
    }
    if (!move_uploaded_file($temp_pImg3, "./product_images/$pImg3")) {
      echo "<script>alert('Error uploading Product Image 3')</script>";
      exit();
    }

    // Insert query
    $insert_products = "INSERT INTO `products` (product_title, product_desc, product_key, category_id, brand_id, pImg1, pImg2, pImg3, product_price, date, status) VALUES ('$product_title', '$product_desc', '$product_key', '$product_category', '$product_brand', '$pImg1', '$pImg2', '$pImg3', '$product_price', NOW(), '$product_status')";

    $result_query = mysqli_query($con, $insert_products);

    if ($result_query) {
      echo "<script>alert('All information has been updated successfully!')</script>";
    } else {
      // Fetch the last error and display it
      $error_message = mysqli_error($con);
      echo "<script>alert('Error inserting data: $error_message')</script>";
    }
  }
}
?>

  <!-- Form -->
  <h1 class="text-center mt-5">Insert Products</h1>
  <hr class="m-0 p-0 w-75 mx-auto mb-2">
  <form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data" action="">
    <div class="col-lg-10 w-75 mx-auto">
      <div class="input-group text-center m-2">
        <label for="product_title" class="mx-2">Product Title:</label>
        <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Insert Product Title here..." required>
      </div>
      <div class="input-group text-center m-2">
        <label for="product_desc" class="mx-2">Product Description:</label>
        <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Insert Product Description here..." required>
      </div>
      <div class="input-group text-center m-2">
        <label for="product_key" class="mx-2">Product Keyword:</label>
        <input type="text" class="form-control" id="product_key" name="product_key" placeholder="Insert Product Keywords here...">
      </div>
      <div class="input-group text-center m-2">
        <select name="product_category" class="form-select text-black" id="product_category" required>
          <option value="">Select a Category</option>
          <?php
          $select_query = "SELECT * FROM `categories`";
          $result_query = mysqli_query($con, $select_query);
          if (!$result_query) {
            die("Error fetching categories: " . mysqli_error($con));
          }
          while ($row = mysqli_fetch_assoc($result_query)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            echo "<option value='$category_id' class='text-black'>$category_title</option>";
          }
          ?>
        </select>
      </div>
      <div class="input-group text-center m-2">
        <select name="product_brands" class="form-select text-black" id="product_brands" required>
          <option value="">Select a Brand</option>
          <?php
          $select_query = "SELECT * FROM `brands`";
          $result_query = mysqli_query($con, $select_query);
          if (!$result_query) {
            die("Error fetching brands: " . mysqli_error($con));
          }
          while ($row = mysqli_fetch_assoc($result_query)) {
            $brand_title = $row['brand_title'];
            $brand_id = $row['brand_id'];
            echo "<option value='$brand_id' class='text-black'>$brand_title</option>";
          }
          ?>
        </select>
      </div>
      <div class="input-group text-center m-2">
        <label for="pImg1" class="mx-2">Product Image1:</label>
        <input type="file" class="form-control" id="pImg1" name="pImg1" required>
      </div>
      <div class="input-group text-center m-2">
        <label for="pImg2" class="mx-2">Product Image2:</label>
        <input type="file" class="form-control" id="pImg2" name="pImg2" required>
      </div>
      <div class="input-group text-center m-2">
        <label for="pImg3" class="mx-2">Product Image3:</label>
        <input type="file" class="form-control" id="pImg3" name="pImg3" required>
      </div>
      <div class="input-group text-center m-2">
        <label for="product_price" class="mx-2">Product Price:</label>
        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Insert Product Price here..." required>
      </div>
      <div class="input-group w-10 mb-2">
        <button type="submit" class="btn mt-2 border-0 p-2 text-white submit" style="background-color: #277A89;" name="insert_product">Insert Product</button>
      </div>
    </div>
  </form>
  