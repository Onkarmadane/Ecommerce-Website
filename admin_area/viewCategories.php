<?php
include("../includes/connection.php");
?>

<!-- From -->
<h1 class="text-center" style="color: #277A89;">View Categories</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data">
  <div class="col-lg-10 w-75 mx-auto">
    <div class="input-group text-center m-2">
      <?php
      $select_query = "SELECT * FROM `categories`";
      $result_query = mysqli_query($con, $select_query);
      if (!$result_query) {
        die("Error fetching categories: " . mysqli_error($con));
      }
      while ($row = mysqli_fetch_assoc($result_query)) {
        $category_title = $row['category_title'];
        $category_id = $row['category_id'];
        $category_img = $row['category_img'];
        echo "<div class='input-group text-center m-2'>
          <input type='text' class='form-control' id='catgory_title' name='catgory_title' value='$category_title' readonly>  
            <img src='./category_images/$category_img' alt='$category_title' class='w-20'> 
            <button class='btn btn-info btn-sm rounded my-1 m-1 ' type='submit'  name='editCategories'>
            <a class='text-decoration-none text-white' href='index.php?editCategories=$category_id'><i class='fa fa-edit'> Edit</i></a></button>
            <button class='btn btn-danger my-1 m-1 btn-sm rounded ' type='submit' name='deleteCategories'>
            <a type='button' class='text-white' data-bs-toggle='modal' data-bs-target='#exampleModal' href='index.php?deleteCategories=$category_id'><i class='fa fa-trash'> Delete</i></a>
            </button>
        </div>";
      }
      ?>
    </div>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Are you Sure want to delete this Category?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?viewCategories" class="text-white text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary text-white"><a class="text-white" href='index.php?deleteCategories=<?php echo $category_id?>'>Yes</a></button>
      </div>
    </div>
  </div>
</div>