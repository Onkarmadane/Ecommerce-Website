<?php
if(isset($_GET['deleteProducts'])){
    $deleteId=$_GET['deleteProducts'];
    // echo $deleteId;
    $deleteProduct="DELETE FROM `products` WHERE product_id=$deleteId";
    $result_product=mysqli_query($con,$deleteProduct);
    if($result_product){
echo "<script>alert('Product Deleted Sucessfully');</script>";
echo "<script>window.open('./index.php?viewProducts','_self');</script>";
    }

}
?>
