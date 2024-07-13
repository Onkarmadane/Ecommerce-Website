<?php
$con = mysqli_connect("localhost", "root", "", "mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$category_id = $category_title = $category_img = "";

if (isset($_GET['editCategories'])) {
    $updateId = $_GET['editCategories'];
    $getProducts = "SELECT * FROM `categories` WHERE category_id=$updateId";
    $result = mysqli_query($con, $getProducts);

    if (!$result) {
        die("Query Failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $category_id = $row["category_id"];
        $category_title = $row['category_title'];
        $category_img = $row['category_img'];
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
                <input type='text' class='form-control' id='category_title' name='category_title' value='<?php echo htmlspecialchars($category_title, ENT_QUOTES); ?>'>
                <img src='./category_images/<?php echo htmlspecialchars($category_img, ENT_QUOTES); ?>' alt='<?php echo htmlspecialchars($category_title, ENT_QUOTES); ?>' class='w-20'>
            </div>
            <input type='file' name='category_img' id='category_img'>
        </div>
        <button class='btn btn-sm rounded my-1 m-1 submit' type='submit' name='updateCategories'>Update</button>
    </div>
</form>

<?php
if (isset($_POST['updateCategories'])) {
    $category_title = mysqli_real_escape_string($con, $_POST["category_title"]);
    $category_img = $_FILES["category_img"]['name'];
    $temp_pImg1 = $_FILES["category_img"]['tmp_name'];

    if ($category_title == '' || $category_img == '') {
        echo "<script>alert('Please Fill all the fields')</script>";
    } else {
        // Moving uploaded files
        if (!move_uploaded_file($temp_pImg1, "./category_images/$category_img")) {
            echo "<script>alert('Error uploading Category Image')</script>";
            exit();
        }

        $updateCategory = "UPDATE `categories` SET category_title='$category_title', category_img='$category_img' WHERE category_id=$updateId";
        $updateResult = mysqli_query($con, $updateCategory);

        if ($updateResult) {
            echo "<script>alert('Category has been Updated Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Error updating Category')</script>";
        }
    }
}
?>
