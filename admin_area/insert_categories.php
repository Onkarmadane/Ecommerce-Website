<?php
include("../includes/connection.php");

if (isset($_POST["insert_cat"])) {
    $category_title = $_POST['catgory_title'];
    // Accessing Images
    $category_image = $_FILES['category_img']['name'];

    // Accessing Image Temp Names
    $temp_category_image = $_FILES['category_img']['tmp_name'];

    // Checking empty condition 
    if (empty($category_title) || empty($category_image)) {
        echo "<script>alert('Please fill out all the mandatory fields')</script>";
        exit();
    } else {
        // Moving uploaded files
        if (!move_uploaded_file($temp_category_image, "./category_images/$category_image")) {
            echo "<script>alert('Error uploading Category Image')</script>";
            exit();
        }

        // Insert query
        $insert_category = "INSERT INTO `categories` (category_title, category_img) VALUES ('$category_title', '$category_image')";

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
<h1 class="text-center" style="color: #277A89;">Insert Categories</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data">
    <div class="col-lg-10 w-75 mx-auto">
        <div class="input-group text-center m-2">
            <div class="input-group-text fa fa-list text-white m-0 p-3" style="background-color: #0097B2;"></div>
            <input type="text" class="form-control" id="catgory_title" placeholder="Insert Categories here..." name="catgory_title">
        </div>
        <div class="input-group text-center m-2">
            <div class="input-group-text fa fa-list text-white m-0 p-3" style="background-color: #0097B2;"></div>
            <input type="file" class="form-control" id="category_img" placeholder="Insert Categories Image here..." name="category_img">
        </div>

        <div class="input-group w-10 mb-2">
            <button type="submit" class="btn mt-2 border-0 p-2 text-white submit" style="background-color: var(--blue);" name="insert_cat">Insert Categories</button>
        </div>
    </div>
</form>
