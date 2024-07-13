<?php
include("../includes/connection.php");
?>

<!-- From -->
<h1 class="text-center" style="color: #277A89;">View Brands</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">
<form class="row row-cols-lg-auto g-3 align-items-center mt-2" method="POST" enctype="multipart/form-data">
  <div class="col-lg-10 w-75 mx-auto">
    <div class="input-group text-center m-2">
      <?php
      $select_query = "SELECT * FROM `brands`";
      $result_query = mysqli_query($con, $select_query);
      if (!$result_query) {
        die("Error fetching categories: " . mysqli_error($con));
      }
      while ($row = mysqli_fetch_assoc($result_query)) {
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        $brand_img = $row['brand_img'];
        echo "<div class='input-group text-center m-2'>
          <input type='text' class='form-control' id='catgory_title' name='catgory_title' value='$brand_title' readonly>  
            <img src='./brand_images/$brand_img' alt='$brand_title' class='w-25'> 
            <button class='btn btn-info btn-sm rounded my-1 m-1 ' type='submit'  name='editBrands'>
            <a class='text-decoration-none text-white' href='index.php?editBrands=$brand_id'><i class='fa fa-edit'> Edit</i></a></button>
            <button class='btn btn-danger my-1 m-1 btn-sm rounded ' type='submit' name='deleteBrands'>
            <a type='button' class='text-white' data-bs-toggle='modal' data-bs-target='#exampleModal' href='index.php?deleteBrands=$brand_id'><i class='fa fa-trash'> Delete</i></a>
            </button>
        </div>";
      }
      ?>
    </div>
  </div>
</form>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Are you Sure want to delete this Brand?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?viewBrands" class="text-white text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary text-white"><a class="text-white" href='index.php?deleteBrands=<?php echo $brand_id?>'>Yes</a></button>
      </div>
    </div>
  </div>
</div>