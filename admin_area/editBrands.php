<?php
$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$category_id = $brand_title = $brand_img = "";

if (isset($_GET['editBrands'])) {
    $updateId = $_GET['editBrands'];
    $getProducts = "SELECT * FROM `brands` WHERE brand_id=$updateId";
    $result = mysqli_query($con, $getProducts);

    if (!$result) {
        die("Query Failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $brand_id = $row["brand_id"];
        $brand_title = $row['brand_title'];
        $brand_img = $row['brand_img'];
    } else {
        echo "No category found with the given ID.";
    }
}
?>

<h1 class="text-center" style="color: #277A89;">Edit Categories</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data">
    <div class="col-lg-10 w-75 mx-auto">
        <div class="input-group text-center m-2">
            <div class='input-group text-center m-2'>
                <input type='text' class='form-control' id='brand_title' name='brand_title' value='<?php echo htmlspecialchars($brand_title, ENT_QUOTES); ?>'>
                <img src='./brand_images/<?php echo htmlspecialchars($brand_img, ENT_QUOTES); ?>' alt='<?php echo htmlspecialchars($brand_title, ENT_QUOTES); ?>' class='w-25'>
            </div>
            <input type='file' name='brand_img' id='brand_img'>
        </div>
        <button class='btn btn-info btn-sm rounded my-1 m-1 ' type='submit' name='updateBrands'>Update</button>
    </div>
</form>

<?php
if (isset($_POST['updateBrands'])) {
    $brand_title = mysqli_real_escape_string($con, $_POST["brand_title"]);
    $brand_img = $_FILES["brand_img"]['name'];
    $temp_pImg1 = $_FILES["brand_img"]['tmp_name'];

    if ($brand_title == '' || $brand_img == '') {
        echo "<script>alert('Please Fill all the fields')</script>";
    } else {
        // Moving uploaded files
        if (!move_uploaded_file($temp_pImg1, "./category_images/$brand_img")) {
            echo "<script>alert('Error uploading Category Image')</script>";
            exit();
        }

        $updateBrand = "UPDATE `brands` SET brand_title='$brand_title', brand_img='$brand_img' WHERE brand_id=$updateId";
        $updateResult = mysqli_query($con, $updateBrand);

        if ($updateResult) {
            echo "<script>alert('Brand has been Updated Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Error updating Category')</script>";
        }
    }
}
?>
