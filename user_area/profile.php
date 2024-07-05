<?php
error_reporting(E_ERROR | E_PARSE);
include("./includes/connection.php");
include("./functions/functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>IndiMart | UserProfile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Font Awesome And Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #277A89;
            --first-color-light: #fff;
            --white-color: #fff;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100;
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s;
        }

        a {
            text-decoration: none;
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s;
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .header_img {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .header_img img {
            width: 70px;
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem;
        }

        .nav_logo {
            margin-bottom: 2rem;
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color);
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700;
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s;
        }

        .nav_link:hover {
            color: var(--white-color);
        }

        .nav_icon {
            font-size: 1.25rem;
        }

        .show {
            left: 0;
            width: 250px;
            /* Adjust width as needed */
        }

        .body-pd {
            padding-left: 250px;
            /* Adjust padding as needed */
        }

        .active {
            color: var(--white-color);
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color);
        }

        .height-100 {
            height: 100vh;
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: 250px;
                /* Adjust padding as needed */
            }

            .nav_name {
                display: inline-block;
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 250px;
                /* Adjust padding as needed */
            }

            .header_img {
                width: 40px;
                height: 40px;
            }

            .header_img img {
                width: 45px;
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0;
            }

            .show {
                width: 250px;
                /* Adjust width as needed */
            }

            .body-pd {
                padding-left: 250px;
                /* Adjust padding as needed */
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId);

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // Show navbar
                        nav.classList.toggle('show');
                        // Change icon
                        toggle.classList.toggle('bx-x');
                        // Add padding to body
                        bodypd.classList.toggle('body-pd');
                        // Add padding to header
                        headerpd.classList.toggle('body-pd');
                    });
                }
            };

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link');

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }

                // Collapse the navbar
                const nav = document.getElementById('nav-bar');
                const bodypd = document.getElementById('body-pd');
                const headerpd = document.getElementById('header');

                nav.classList.remove('show');
                bodypd.classList.remove('body-pd');
                headerpd.classList.remove('body-pd');
                const toggle = document.getElementById('header-toggle');
                toggle.classList.remove('bx-x');
            }

            linkColor.forEach(l => l.addEventListener('click', colorLink));
        });
    </script>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <?php
        $con=mysqli_connect("localhost","root","","mystore1");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }
        $username = $_SESSION['username'];
        $userImg = "SELECT * FROM `user` WHERE username='$username'";
        $userImg = mysqli_query($con, $userImg);
        $row_image = mysqli_fetch_array($userImg);
        $userImg = $row_image['userImg'];
        echo " <div class='header_img'> <img src='./userImg/$userImg' alt=''> </div>";
        ?>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
            <?php
        $username = $_SESSION['username'];
        $username = "SELECT * FROM `user` WHERE username='$username'";
        $username = mysqli_query($con, $username);
        $row_user = mysqli_fetch_array($username);
        $username = $row_user['username'];
        ?>
                <a href="#" class="nav_logo"> <i class='fa fa-user nav_logo-icon'></i> <span class="nav_logo-name"><?php echo $username ?></span> </a>
                <div class="nav_list">
                    <a href="profile.php?myorders" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">My Orders</span> </a>
                    <a href="profile.php" class="nav_link"> <i class='fa fa-clock-o  nav_icon'></i> <span class="nav_name">My Pending Orders</span> </a>
                    <a href="profile.php?editAccount" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile Information</span> </a>
                    <a href="profile.php?deleteAccount" class="nav_link"> <i class='fa fa-trash nav_icon'></i> <span class="nav_name">Delete Account</span> </a>
                </div>
            </div>
            <a href="userLogout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>User Dashboard</h4>
        <div class="col-md-10">
        <?php  get_user_order_details();?>
        </div>
    </div>
    <!--Container Main end-->

    <?php
function get_user_order_details()
{
  global $con;
  $username = $_SESSION['username'];
  $get_details = "Select * from `user` where username='$username'";
  $result_query = mysqli_query($con, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $userId = $row_query['userId'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "SELECT * FROM `userorders` WHERE userId=$userId AND orderStatus='Pending'";
          $result_order_query = mysqli_query($con, $get_orders);
          $row_count_query = mysqli_num_rows($result_order_query);
          if ($row_count_query > 0) {
            echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                       <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";
          } else {
            echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                         <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}
if (!function_exists('get_user_order_details')) {
  function get_user_order_details()
  {
    global $con;

    // Check if the session username is set
    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];

      // Prepare and execute query to get user details
      $get_details = "SELECT * FROM user WHERE username='$username'";
      $result_query = mysqli_query($con, $get_details);

      // Check if query executed successfully
      if ($result_query) {
        // Fetch user details
        $row_query = mysqli_fetch_array($result_query);
        $userId = $row_query['userId'];

        // Check if edit_account, my_orders, and delete_account parameters are not set
        if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
          // Prepare and execute query to get pending orders
          $getorders = "SELECT * FROM `useRorders` WHERE userId=$userId AND orderStatus='Pending'";
          $result_order_query = mysqli_query($con, $getorders);

          // Check if query executed successfully
          if ($result_order_query) {
            $row_count_query = mysqli_num_rows($result_order_query);

            // Display pending orders count and links accordingly
            if ($row_count_query == 0) {
              echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                            <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";
            } else {
              echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";
            }
          } else {
            echo "Error: " . mysqli_error($con); // Display error if query fails
          }
        }
      }
    }
  }
}

// Get user order details

    ?>
</body>

</html>