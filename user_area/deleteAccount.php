<h1 class="text-center" style="color:#277A89;"><b>Delete Account</b></h1>
<hr class="w-75 mx-auto ">
<form action="" method="POST" class="mt-5">
    <div class="form-outline text-center ">
        <button type="submit" name="delete" class="btn btn-danger mx-3">Delete Account</button>
        <button type="submit" name="dontdelete" class="btn btn-success">Don't Delete Account</button>
    </div>
</form>



<?php
$_SESSION['username'] = $username;
if (isset($_POST['delete'])) {
    $deleteQuery = "DELETE FROM `user` WHERE username='$username'";
    $result = mysqli_query($con, $deleteQuery);
    if ($result) {

        session_destroy();
        echo "<script>alert('Username  $username Account has been deleted Succesfully')</script>";
        echo "<script>window.open('../index.php','_self');</script>";
    }
}
if (isset($_POST["dontdelete"])) {
    echo "<script>window.open('profile.php','_self');</script>";
}
?>