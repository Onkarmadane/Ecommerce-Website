<?php
error_reporting(E_ERROR | E_PARSE);
include("../functions/functions.php");
include("../includes/connection.php");
@session_start();
?>

<!doctype html>
<html lang="en">

<head>
<title>IndiMart | User Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <!------ Include the above in your HEAD tag ----------> <style>
        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* background-color: #f8f9fa; */
        }
        .form-column {
            /* border: 1px solid var(--blue); */
            border-radius: 15px;
            background-color: #fff;
            padding: 20px;
        }
        .image-column {
            border-radius: 15px;
            padding: 0;
        }
        .image-column img {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div id="login">
    <div class="container form-container">
        <div class="row w-100">
            <div class="col-md-6 image-column">
                <img src="../assets/images/login3.jpg" alt="Login Image"> <!-- Replace with your image path -->
            </div>
            <div class="col-md-6 form-column">
                <form id="login-form" class="form" action="" method="post">
                    <h1 class="text-center pt-5" style="color:var(--blue);">User Login Form</h1>
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column">
                            <div id="login-box">
                                <div class="form-group">
                                    <label for="username" style="color:var(--blue);">Username:</label>
                                    <input type="text" name="username" id="username" class="form-control" style="border-radius: 50px; border:1px solid var(--blue);">
                                </div>
                                <div class="form-group">
                                    <label for="pass" style="color:var(--blue);">Password:</label>
                                    <input type="text" name="pass" id="pass" class="form-control" style="border-radius: 50px; border:1px solid var(--blue);">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="userLogin" class="btn btn-success btn-md m-2" value="Login">
                                </div>
                                <div id="register-link" class="text-right">Not have an Account?
                                    <a href="userRegistration" style="color:var(--blue);">Register here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>

</html>

<?php
if (isset($_POST['userLogin'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    // $contact=$_POST['contact'];
    $select_query = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $ip = getIPAddress();
    // Cart Item 
    $select_query_cart = "SELECT * FROM `cart` WHERE ip='$ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $username;
        if (password_verify($pass, $row_data['pass'])) {
            // echo "<script>alert('User Logged in Succesfully');</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Welcome to IndiMart $username');</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $username;
                echo "<script>alert('Welcome to IndiMart $username');</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('No user found Register New User');</script>";
        echo "<script>window.open('userRegistration.php', '_self')</script>";
    }
}

?>