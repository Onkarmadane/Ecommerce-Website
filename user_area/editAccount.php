<?php
$con=mysqli_connect("localhost","root","","mystore1");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
if (isset($_GET['editAccount'])) {
    global $con;
    $userSessionName = $_SESSION['username'];
    $select_query = "SELECT * FROM `user` WHERE username= '$username'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $userId = $row_fetch["userId"];
    $username = $row_fetch["username"];
    $email = $row_fetch["email"];
    $adress = $row_fetch["adress"];
    $contact = $row_fetch["contact"];
}
if (isset($_POST["submit"])) {
    global $con;
    $updateId = $userId;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $adress = $_POST["adress"];
    $contact = $_POST["contact"];
    $userImg = $_FILES['userImg']['name'];
    $tmpUserImg = $_FILES['$userImg']['tmp'];
    move_uploaded_file($tmpUserImg, "./userImg/$userImg");
    $update_query = "UPDATE `user` SET username='$username',email='$email',userImg='$userImg',adress='$adress',contact='$contact' WHERE userId='$updateId'";
    $result_update_query = mysqli_query($con, $update_query);
    if ($result_update_query) {
        echo "<script>alert('User information updated sucessfully');</script>";
        echo "<script>window.open('userLogout.php','_self');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndiMart | Edit User Account</title>
</head>

<body>
    <h3 class="text-center mt-3" style="color: #277A89;"><b>Edit Account</b></h3>
    <hr class="w-75 mx-auto mb-4">
    <form class="w-75 mx-auto mt-1  p-3" enctype="multipart/form-data" action="" method="POST">
        <!-- <h1 class="text-center mt-1" style="color:var(--blue);"><b>User Registration Form</b></h1> -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:var(--blue) !important;">Name :</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" id="username" name="username" value="<?php echo $username ?> " style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="name-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:var(--blue) !important;">Email address :</label>
            <input type="email" id="email" class="form-control" aria-describedby="emailHelp" name="email" value="<?php echo $email ?> " style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="email-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label class="form-label" style="color:var(--blue) !important;">User Image :</label>
            <div class="d-flex">
                <input type="file" id="userImg" class="form-control" name="userImg" style="border-radius: 50px;  border:1px solid var(--blue);">
                <img src="./userImg/<?php echo $userImg ?>" alt='' class="w-25 mx-auto">
                <!-- <span id="email-error" class="error-message"></span> -->
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Address :</label>
            <input type="text" class="form-control" id="adress" name="adress" placeholder="Enter Your Address Here..." style="border-radius: 50px;  border:1px solid var(--blue);" value="<?php echo $adress ?> ">
            <!-- <span id="cpass-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Contact :</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact ?> " style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="cpass-error" class="error-message"></span> -->
        </div>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success" name="submit">Update</button>
    </form>

</body>

</html>