<?php
error_reporting(E_ERROR | E_PARSE);
include("../../Project/includes/connection.php");
include("../functions/functions.php");

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<h1 class="text-center" style="color: #277A89;">All Products</h1>
<hr class="m-0 p-0 w-75 mx-auto mb-2">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .status-icon {
        font-size: 1rem;
        margin-right: 0.5rem;
    }
</style>
</head>

<body>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table align-middle mb-0 bg-white table-hover table-striped">
                <thead class="bg-light text-center">
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Total Sold</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table text-center">
                    <?php
                    $getProducts = "SELECT * FROM `products`";
                    $number = 1;
                    $result = mysqli_query($con, $getProducts);
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $pImg1 = $row['pImg1'];
                        $product_price = $row['product_price'];
                        $status = $row['status'];
                        echo "<tr>
    <td>
        <p>$number</p>
    </td>
    <td>
        <div class='d-flex align-items-center'>
            <img src='./product_images/$pImg1' alt='$product_title' style='width: 100px; height: 100px' class='rounded-circle'>
            <div class='ms-3'>
                <p class='fw-bold mb-1'>$product_title</p>
            </div>
        </div>
    </td>
    <td>
        <p class='fw-normal mb-1'>&#8377; $product_price/-</p>
    </td>
    
    <td>5</td>
    <td>
        <span class='badge badge-success rounded-pill d-inline'>
            <i class='fas fa-check-circle status-icon'></i>$status
        </span>
    </td>
    <td>
        <button type='button' class='btn btn-info btn-sm btn-rounded'><a class='text-decoration-none text-black' href='index.php?editProducts=$product_id'><i class='fa fa-edit'> Edit</i></a></button>
        <button type='button' class='btn btn-danger btn-sm btn-rounded'><a type='button' class='text-black text-decoration-none' data-bs-toggle='modal' data-bs-target='#exampleModal' href='index.php?deleteProducts=$product_id'><i class='fa fa-trash'> Delete</i></a></button>
    </td>
</tr>";
                        $number++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Are you Sure want to delete this Category?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"><a href="index.php?viewProducts" class="text-white text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary text-white"><a class="text-white text-decoration-none" href='index.php?deleteProducts=<?php echo $product_id?>'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>