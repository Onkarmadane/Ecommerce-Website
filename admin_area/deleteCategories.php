<?php
if (isset($_GET['deleteCategories'])) {
    $deleteId = $_GET['deleteCategories'];
    // echo $deleteId;
    $deletecategory = "DELETE FROM `categories` WHERE category_id=$deleteId";
    $result_cat = mysqli_query($con, $deletecategory);
    if ($result_cat) {
        echo "<script>alert('Category Has been Deleted Sucessfully');</script>";
        echo "<script>window.open('./index.php?viewCategories','_self');</script>";
    }
}
