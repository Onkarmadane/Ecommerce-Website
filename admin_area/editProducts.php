<?php
$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['editProducts'])) {
    $updateId = $_GET['editProducts'];
    $getProducts = "SELECT * FROM `products` WHERE product_id=$updateId";
    $result = mysqli_query($con, $getProducts);
    $row = mysqli_fetch_array($result);
    $product_title = $row["product_title"];
    $product_desc = $row["product_desc"];
    $product_key = $row["product_key"];
    $category_id = $row["category_id"];
    $brand_id = $row["brand_id"];
    $pImg1 = $row["pImg1"];
    $pImg2 = $row["pImg2"];
    $pImg3 = $row["pImg3"];
    $product_price = $row["product_price"];
}
?>

<!-- Form -->
<h1 class="text-center" style="color: #277A89;">Edit Products</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data" action="">
    <div class="col-lg-10 w-75 mx-auto">
        <div class="input-group text-center m-2">
            <label for="product_title" class="mx-2">Product Title:</label>
            <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo htmlspecialchars($product_title, ENT_QUOTES); ?>">
        </div>
        <div class="input-group text-center m-2">
            <label for="product_desc" class="mx-2">Product Description:</label>
            <input type="text" class="form-control" id="product_desc" name="product_desc" value="<?php echo htmlspecialchars($product_desc, ENT_QUOTES); ?>">
        </div>
        <div class="input-group text-center m-2">
            <label for="product_key" class="mx-2">Product Keyword:</label>
            <input type="text" class="form-control" id="product_key" name="product_key" value="<?php echo htmlspecialchars($product_key, ENT_QUOTES); ?>">
        </div>
        <div class="input-group text-center m-2">
            <select name="category_id" class="form-select text-black" id="category_id">
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
            <select name="brand_id" class="form-select text-black" id="brand_id">
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
            <input type="file" class="form-control" id="pImg1" name="pImg1">
            <img src="./product_images/<?php echo htmlspecialchars($pImg1, ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($product_title, ENT_QUOTES); ?>" class="w-25">
        </div>
        <div class="input-group text-center m-2">
            <label for="pImg2" class="mx-2">Product Image2:</label>
            <input type="file" class="form-control" id="pImg2" name="pImg2">
            <img src="./product_images/<?php echo htmlspecialchars($pImg2, ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($product_title, ENT_QUOTES); ?>" class="w-25">
        </div>
        <div class="input-group text-center m-2">
            <label for="pImg3" class="mx-2">Product Image3:</label>
            <input type="file" class="form-control" id="pImg3" name="pImg3">
            <img src="./product_images/<?php echo htmlspecialchars($pImg3, ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($product_title, ENT_QUOTES); ?>" class="w-25">
        </div>
        <div class="input-group text-center m-2">
            <label for="product_price" class="mx-2">Product Price:</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo htmlspecialchars($product_price, ENT_QUOTES); ?>">
        </div>
        <div class="input-group w-10 mb-2">
            <button type="submit" class="btn mt-2 border-0 p-2 text-white submit" style="background-color: #277A89;" name="updateProduct">Update Product</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['updateProduct'])) {

    $product_title = mysqli_real_escape_string($con, $_POST["product_title"]);
    $product_desc = mysqli_real_escape_string($con, $_POST["product_desc"]);
    $product_key = mysqli_real_escape_string($con, $_POST["product_key"]);
    $category_id = mysqli_real_escape_string($con, $_POST["category_id"]);
    $brand_id = mysqli_real_escape_string($con, $_POST["brand_id"]);
    $pImg1 = mysqli_real_escape_string($con, $_FILES["pImg1"]['name']);
    $pImg2 = mysqli_real_escape_string($con, $_FILES["pImg2"]['name']);
    $pImg3 = mysqli_real_escape_string($con, $_FILES["pImg3"]['name']);
    $temp_pImg1 = $_FILES["pImg1"]['tmp_name'];
    $temp_pImg2 = $_FILES["pImg2"]['tmp_name'];
    $temp_pImg3 = $_FILES["pImg3"]['tmp_name'];
    $product_price = mysqli_real_escape_string($con, $_POST["product_price"]);

    if ($product_title == '' || $product_desc == '' || $product_key == '' || $product_price == '' || $category_id == '' || $brand_id == '' || $pImg1 == '' || $pImg2 == '' || $pImg3 == '') {
        echo "<script>alert('Please Fill all the fields')</script>";
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
        $updateProducts = "UPDATE  `products` SET product_title='$product_title', product_desc='$product_desc', product_key='$product_key', category_id=$category_id, brand_id=$brand_id, pImg1='$pImg1', pImg2='$pImg2', pImg3='$pImg3', product_price='$product_price', date=NOW() WHERE product_id=$updateId";
        $Upateresult = mysqli_query($con, $updateProducts);
        if ($Upateresult) {
            echo "<script>alert('Product has been Updated Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
?>
