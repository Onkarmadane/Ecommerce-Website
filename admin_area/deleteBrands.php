<?php
if(isset($_GET['deleteBrands'])){
    $deleteId=$_GET['deleteBrands'];
    // echo $deleteId;
    $deleteBrand="DELETE FROM `brands` WHERE brand_id=$deleteId";
    $resultBrand=mysqli_query($con,$deleteBrand);
    if($resultBrand){
echo "<script>alert('Brand Deleted Sucessfully');</script>";
echo "<script>window.open('./index.php?viewBrands','_self');</script>";
    }

}
?>
