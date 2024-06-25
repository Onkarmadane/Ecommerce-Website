<!-- Connecting of php and DB file -->
<?php
include("./includes/connection.php");
include("./functions/functions.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IndiMart | Cart</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo1.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-HXR1xQ5zDxd1RfVmiI4UyirRyx30v2uS8QG2gEB3KbhD0BNwbVg6YKd1ecItZJt6B2UVF/e+3SZ1g5QbN/DAmg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./assets/images/logo1.png" alt="" style="height: 50px !important;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto mx-5">
                        <li class="nav-item">
                            <a class="nav-link " href="#"> <i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn position-relative " href="cart.php"> <i class="fa fa-shopping-cart mx-1"></i>Cart
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mx-1 "><?php cartItemsNumbers(); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Cart function call -->
    <?php cart(); ?>

    <!-- Cart Display -->
    <div class="container">
        <div class="row">
            <div class="col-12 " style="transition: none !important;transform:none !important;">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-4 col-md-2">
                                <img loading="lazy" class="img-fluid" alt="" src="https://rukminim2.flixcart.com/image/224/224/kyuge4w0/shoe/b/n/s/10-mrj1811-10-aadi-black-white-original-imagayvwkgmvfhyj.jpeg?q=90">
                            </div>
                            <div class="col-8 col-md-10">
                                <div><a href="#">Product titles</a></div>
                                <div>Description</div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price-strike">₹1,999</span>
                                        <span class="price-current">₹299</span>
                                        <span class="price-discount">85% Off</span>
                                    </div>

                                </div>
                                <div class="mt-3">
                                    Delivery by Fri Jun 28 | <span class="text-success">Free</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-secondary" disabled> – </button>
                                <input type="text" class="form-control input-quantity mx-2" value="1">
                                <button class="btn btn-outline-secondary"> + </button>
                            </div>
                            <div>
                                <!-- <button class="btn btn-link">Save for later</button> -->
                                <button class="btn btn-danger fa fa-trash p-3">  Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Price details</h5>
                        <div class="d-flex justify-content-between">
                            <div>Price (1 item)</div>
                            <div>₹1,999</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Discount</div>
                            <div>− ₹1,700</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Delivery Charges</div>
                            <div>Free</div>
                        </div>
                        <div class="d-flex justify-content-between total-amount">
                            <div>Total Amount</div>
                            <div>₹299</div>
                        </div>
                        <div class="text-success mt-2">You will save ₹1,700 on this order</div>
                    </div>
                    <div class="card-body ">
                        <form method="post" action="#">
                            <input type="hidden" name="domain" value="physical">
                            <button class="btn btn-success fa fa-shopping-cart p-3"> Place Order</button>
                            <button class="btn  text-white fa fa-shopping-bag p-3" style=" background-color: #1f5963;"> Countinue Shopping</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mb-4">
                    Safe and Secure Payments. Easy returns. 100% Authentic products.
                </div>
            </div>
            <!-- <div class="col-12 col-lg-4"> -->



            <!-- </div> -->
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-white mt-3 pt-4 pb-3" style="background-color: #277A89 !important;">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-md-4">
                    <h5>IndiMart</h5>
                    <p>
                        1234 Street Name<br>
                        City, State, 12345<br>
                        Phone: (123) 456-7890<br>
                        Email: info@company.com
                    </p>
                </div>
                <!-- Quick Links -->
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <!-- Social Media -->
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-white mr-3"><i class="fa fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fa fa-linkedin-in"></i></a>
                </div>
            </div>
            <hr class="bg-white">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0">&copy; 2024 IndiMart. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Welcome to IndiMart",
                "Discover the best products at unbeatable prices"
            ];
            let count = 0;
            let index = 0;
            let currentText = '';
            let letter = '';

            (function type() {
                if (count === texts.length) {
                    count = 0;
                }
                currentText = texts[count];
                letter = currentText.slice(0, ++index);

                document.getElementById('typewriter-text').textContent = letter;
                if (letter.length === currentText.length) {
                    count++;
                    index = 0;
                    setTimeout(() => {
                        document.getElementById('typewriter-text').textContent = '';
                        setTimeout(type, 500);
                    }, 2000);
                } else {
                    setTimeout(type, 100);
                }
            })();
        });
    </script> -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      var cards = document.querySelectorAll(".card");
      cards.forEach(function(card) {
        // Save the original inline styles (if any)
        card.dataset.originalStyle = card.getAttribute('style');

        // Remove hover effect and apply as inline style
        card.addEventListener('mouseenter', function() {
          this.style.filter = 'none';
          this.style.transition = 'none';
          this.style.transform = 'none';
        });

        // Restore original styles on mouse leave
        card.addEventListener('mouseleave', function() {
          if (this.dataset.originalStyle) {
            this.setAttribute('style', this.dataset.originalStyle);
          } else {
            this.removeAttribute('style');
          }
        });
      });
    });
  </script>
</body>

</html>