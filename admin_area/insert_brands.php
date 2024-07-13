<?php
include("../includes/connection.php");
if (isset($_POST["insert_brand"])) {
    $brand_title = $_POST['brand_title'];
    $brand_img = $_FILES['brand_img']['name'];

    // Accessing Image Temp Names
    $temp_brand_img = $_FILES['brand_img']['tmp_name'];

    // Checking empty condition 
    if (empty($brand_title) || empty($brand_img)) {
        echo "<script>alert('Please fill out all the mandatory fields')</script>";
        exit();
    } else {
        // Moving uploaded files
        if (!move_uploaded_file($temp_brand_img, "./brand_images/$brand_img")) {
            echo "<script>alert('Error uploading Category Image')</script>";
            exit();
        }

        // Insert query
        $insert_category = "INSERT INTO `brands` (brand_title, brand_img) VALUES ('$brand_title', '$brand_img')";

        $result_query = mysqli_query($con, $insert_category);

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
   
   <!-- From -->
    <h1 class="text-center" style="color: #277A89;">Insert Brands</h1>
    <hr class="m-0 p-0 w-75 mx-auto mb-2">
    <form class="row row-cols-lg-auto g-3 align-items-center mt-2 " method="POST" enctype="multipart/form-data">
        <div class="col-lg-10 w-75 mx-auto">
          <div class="input-group text-center">
            <div class="input-group-text fa fa-list text-white m-0 p-3 " style="background-color: #0097B2;"></div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Insert Brands here..." name="brand_title"> 
          </div>
          <div class="input-group text-center m-2">
            <div class="input-group-text fa fa-list text-white m-0 p-3" style="background-color: #0097B2;"></div>
            <input type="file" class="form-control" id="brand_img" placeholder="Insert Categories Image here..." name="brand_img">
        </div>
          <div class="input-group w-10 mb-2">
          <button type="submit" class=" btn  mt-2 border-0 p-2 text-white submit" style="background-color: var(--blue);" name="insert_brand">Insert Brands</button>
        </div>
        </div>
</form>      
    
  
