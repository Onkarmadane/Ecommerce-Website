<?php
include("../includes/connection.php");
if (isset($_POST["insert_cat"])) {
    $category_title = $_POST['cat-title'];
    // select data from database
    $select_query = "Select * from `categories` where category_title = '$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows(mysqli_query($con, $select_query));
    if ($number > 0) {
        echo "<script>alert('This Category already present in database')</script>";
    }else{
    $insert_query = "insert into `categories`(category_title) values('$category_title')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<script>alert('Category has been inserted successfully!')</script>";
    }
}
}

?>
<!-- From -->
<h1 class="text-center ">Insert Categories</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2 " method="POST">
    <div class="col-lg-10 w-75 mx-auto">
        <div class="input-group text-center">
            <div class="input-group-text fa fa-list text-white m-0 p-3 " style="background-color: #0097B2;"></div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Insert Categories here..." name="cat-title">
        </div>
        <div class="input-group w-10 mb-2">
            <button type="submit" class="bg-info btn btn-info mt-2 border-0 p-2" name="insert_cat">Insert Categories</button>
        </div>
    </div>
</form>