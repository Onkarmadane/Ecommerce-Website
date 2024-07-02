<?php
error_reporting(E_ERROR | E_PARSE);
include("../includes/connection.php");
include("../functions/functions.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-light">
    <!-- <hr class="sctn-line mb-1 w-75 mx-auto"> -->
    <form class="w-75 mx-auto mt-1  p-3" enctype="multipart/form-data" action="" method="POST">
        <h1 class="text-center mt-1" style="color:var(--blue);"><b>User Registration Form</b></h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:var(--blue) !important;">Name :</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" id="username" name="username" placeholder="Enter Your Name Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="name-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:var(--blue) !important;">Email address :</label>
            <input type="email" id="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter Your email Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="email-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label class="form-label" style="color:var(--blue) !important;">User Image :</label>
            <input type="file" id="userImg" class="form-control" name="userImg" style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="email-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Password :</label>
            <input type="text" class="form-control" id="pass" name="pass" placeholder="Enter Your Password Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="pass-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Confirm Password :</label>
            <input type="text" class="form-control" id="cpass" name="cpass" placeholder="Enter Your Confirm Password Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="cpass-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Address :</label>
            <input type="text" class="form-control" id="adress" name="adress" placeholder="Enter Your Address Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="cpass-error" class="error-message"></span> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:var(--blue) !important;">Contact :</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Your Confirm Password Here..." style="border-radius: 50px;  border:1px solid var(--blue);">
            <!-- <span id="cpass-error" class="error-message"></span> -->
        </div>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
        <p class="text-left mt-4 w-75 p-0 ">Already Have an Account? <a href="userLogin.php">Login</a></p>
    </form>
    <!-- <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const pass = document.getElementById('pass').value;
            const cpass = document.getElementById('cpass').value;
            let isValid = true;

            if (name === "" || /\d/.test(name)) {
                alert("Please Enter Name");
                isValid = false;
            }
            if (email === "" || !email.includes("@")) {
                alert("Please Enter Valid Email");
                isValid = false;
            }
            // if (pass === "" || pass.length < 6 || !pass.includes("@,$,!,&")) {
            //     alert("Please enter a password with at least 6  characters.and also include symbols into it");
            //     isValid = false;
            // }

            if (cpass != pass) {
                alert("Please enter a Confirm password same as password");
                isValid = false;
            }
            return isValid;
        }
    </script> -->
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $userImg = $_FILES['userImg']['name'];
        $userImgTmp = $_FILES['userImg']['tmp_name'];
        $pass = $_POST['pass'];
        $hashPass=password_hash($pass,PASSWORD_DEFAULT);
        $cpass = $_POST['cpass'];
        $adress = $_POST['adress'];
        $contact = $_POST['contact'];
        $ip = getIPAddress();

        // Select Query
        $select_query = "SELECT * FROM `user` WHERE  email='$email' AND  contact='$contact'";
        $result = mysqli_query($con, $select_query);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            echo "<script>alert('User Already Exists try to login or Register With Diffrent Username');</script>";
        } else { // insert
            move_uploaded_file($userImgTmp, "./userImg/$userImg");
            $insert_query = "INSERT INTO `user` (username,email,userImg,pass,cpass,adress,contact,ip) VALUES ('$username','$email','$userImg','$hashPass','$cpass','$adress','$contact','$ip')";
            $sql_execute = mysqli_query($con, $insert_query);
            if ($sql_execute) {
                echo "<script>alert('Data Inserted Succesfully');</script>";
            }elseif ($pass!=$cpass){
                echo "<script>alert('Use Same Password and Confirm Password');</script>";
                
            } else {
                die(mysqli_error($con));
            }
        }
        $selectCartItems="SELECT * FROM `cart` WHERE ip='$ip'";
        $resultCart= mysqli_query($con,$selectCartItems);
        $rowCount=mysqli_num_rows($resultCart);
        if($rowCount>0){
            $_SESSION['username'];
            echo "<script>alert('You have items in your cart');</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>