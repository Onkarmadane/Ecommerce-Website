<?php
    // include ("./includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        //getting Products
        function getproducts()
        {
            global $connect;

            //condition to check isset or not
            if(!isset($_GET['category']))
            {            
                if(!isset($_GET['brand']))
                {
                    $select_query="Select * from `products` order by rand() LIMIT 0,9";
                    $result_query=mysqli_query($connect,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['catagery_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_title</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>Price: Rs.$product_price/-</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                        </div>
                                </div>
                            </div>";
                    }
                }
            }
        }
    
        // getting all products
        function get_all_products()
        {
            global $connect;

            //condition to check isset or not
            if(!isset($_GET['category']))
            {            
                if(!isset($_GET['brand']))
                {
                    $select_query="Select * from `products` order by rand()";
                    $result_query=mysqli_query($connect,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['catagery_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_title</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>Price: Rs.$product_price/-</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                        </div>
                                </div>
                            </div>";
                    }
                }
            }
        }






        // Getting unique categories
function get_unique_categories() {
    global $connect;

    // Condition to check if 'category' is set in the URL
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM products WHERE category_id=$category_id";
        $result_query = mysqli_query($connect, $select_query );
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock available for this category.</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id']; // Corrected typo here
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: Rs.$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}


        //getting unique categories
        function get_unique_brand()
        {
            global $connect;

            //condition to check isset or not
            if(isset($_GET['brand']))
            {       
                $brand_id=$_GET['brand'];    
                $select_query="Select * from `products` where brand_id=$brand_id";
                $result_query=mysqli_query($connect,$select_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                {
                    echo "<h2 class='text-center text-danger'>No brand available for this category.</h2>";
                }
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['catagery_id'];
                    $brand_id=$row['brand_id'];

                    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: Rs.$product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                            </div>
                        </div>";
                }
            }
        }

        //searching products function
        function search_product()
        {
            global $connect;
                if(isset($_GET['search_data']))
                {
                    $user_search_data=$_GET['search'];
                    $search_query="Select * from `products` where product_keyword like '%$user_search_data%'";
                    $result_query=mysqli_query($connect,$search_query);
                    $num_of_rows=mysqli_num_rows($result_query);
                    if($num_of_rows==0)
                    {
                        echo "<h2 class='text-center text-danger'>No result found for this category.</h2>";
                    }
                    if (!$result_query) {
                        die("Error in SQL query: " . mysqli_error($connect));
                    }
                    
                    // Step 2: Check if $result is a valid mysqli_result object
                    if (!($result_query instanceof mysqli_result)) {
                        die("Query did not return a valid result set");
                    }
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['catagery_id'];
                        $brand_id=$row['brand_id'];

                        echo "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_title</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>Price: Rs.$product_price/-</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                        </div>
                                </div>
                            </div>";
                    }
                }
        }


        // View details
        function view_details()
        {
            global $connect;

            //condition to check isset or not
            if (isset($_GET['product_id']))
            {
                if(!isset($_GET['category']))
                {            
                    if(!isset($_GET['brand']))
                    {
                        $product_id=$_GET['product_id'];
                        $select_query="Select * from `products` where product_id=$product_id";
                        $result_query=mysqli_query($connect,$select_query);
                        while($row=mysqli_fetch_assoc($result_query))
                        {
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_description=$row['product_description'];
                            $product_image1=$row['product_image1'];
                            $product_image2=$row['product_image2'];
                            $product_image3=$row['product_image3'];
                            $product_price=$row['product_price'];
                            $category_id=$row['catagery_id'];
                            $brand_id=$row['brand_id'];

                            echo "<div class='col-md-4 mb-2'>
                                    <div class='card'>
                                        <img src='./admin_area/products/$product_image1' class='card-img-top' alt='...' style='height:225px;'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>$product_title</h5>
                                                <p class='card-text'>$product_description</p>
                                                <p class='card-text'>Price: Rs.$product_price/-</p>
                                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                                <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                            </div>
                                    </div>
                                </div>
                                <div class='col-md-8'>
                                    <!-- related cards -->
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <h4 class='text-center text-info mb-5'>Related Products</h4>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/products/$product_image2' class='card-img-top' alt='...' style='height:225px;'>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/products/$product_image3' class='card-img-top' alt='...' style='height:225px;'>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                }
            }
        }

        // Get IP Address function 
        function getIPAddress() 
        {    
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
            {  
                $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
            }   
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
            {  
                $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }    
            else
            {  
                $ip_address = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip_address;  
        }  
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 

        //Cart Function
        function cart()
        {
            if(isset($_GET['add_to_cart']))
            {
                global $connect;
                $ip_address = getIPAddress();
                $get_product_id=$_GET['add_to_cart'];
                $select_query="Select * from `cart_details` where ip_address='$ip_address' and product_id=$get_product_id";
                $result_query=mysqli_query($connect,$select_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows>0)
                {
                    echo "<script>alert('Item already inserted to cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
                else
                {
                    $insert_query="insert into `cart_details` (product_id,ip_address, quantity) values ('$get_product_id','$ip_address',0)";
                    $result_query=mysqli_query($connect,$insert_query);
                    echo "<script>alert('Item inserted to cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }        
            }
        }

        //function to cart_item_numbers
        function cart_item()
        {
            if(isset($_GET['add_to_cart']))
            {
                global $connect;
                $ip_address = getIPAddress();
                $select_query="Select * from `cart_details` where ip_address='$ip_address'";
                $result_query=mysqli_query($connect,$select_query);
                $count_cart_items=mysqli_num_rows($result_query);
            }
            else
            {
                global $connect;
                $ip_address = getIPAddress();
                $select_query="Select * from `cart_details` where ip_address='$ip_address'";
                $result_query=mysqli_query($connect,$select_query);
                $count_cart_items=mysqli_num_rows($result_query);
            }        
            echo $count_cart_items;
        }

        //Total Price function
        function total_price()
        {
            global $connect;
            $ip_address = getIPAddress();
            $total_price = 0;
            $cart_query = "Select * from `cart_details` where ip_address='$ip_address'";
            $result = mysqli_query($connect,$cart_query);
            while($row = mysqli_fetch_array($result))
            {
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id = '$product_id'";
                $result_product = mysqli_query($connect,$select_products);
                while($row_product_price = mysqli_fetch_array($result_product))
                {
                    $product_price=array($row_product_price['product_price']);
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
                }
            }
            echo $total_price;
        }

       // get user order details
        function get_user_order_details()
         {
            global $connect;
            $username = $_SESSION['username'];
         $get_details="Select * from `user_table` where user_name='$username'";
             $result_query = mysqli_query($connect,$get_details);
             while($row_query=mysqli_fetch_array($result_query))
             {
                 $user_id=$row_query['user_id'];
                 if(!isset($_GET['edit_account']))
               {
                     if(!isset($_GET['my_orders']))
                     {
                         if(!isset($_GET['delete_account']))
                         {
                             $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='Pending'";
                             $result_order_query=mysqli_query($connect,$get_orders);
                             $row_count_query=mysqli_num_rows($result_order_query);
                           if($row_count_query>0)
                             {
                                 echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                               <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";                                
                             }
                           else
                             {
                                 echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                                 <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";
                            }
                         }
                     }
             }
             }
         }
           if (!function_exists('get_user_order_details')) {
            function get_user_order_details() {
                global $connect;
                
                // Check if the session username is set
                if(isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    
                    // Prepare and execute query to get user details
                    $get_details = "SELECT * FROM user_table WHERE user_name='$username'";
                    $result_query = mysqli_query($connect, $get_details);
                    
                    // Check if query executed successfully
                    if($result_query) {
                        // Fetch user details
                        $row_query = mysqli_fetch_array($result_query);
                        $user_id = $row_query['user_id'];
                        
                        // Check if edit_account, my_orders, and delete_account parameters are not set
                        if(!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
                            // Prepare and execute query to get pending orders
                            $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='Pending'";
                            $result_order_query = mysqli_query($connect, $get_orders);
                            
                            // Check if query executed successfully
                            if($result_order_query) {
                                $row_count_query = mysqli_num_rows($result_order_query);
                                
                                // Display pending orders count and links accordingly
                                if($row_count_query == 0) {
                                    echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                                    <p class='text-center'><a href='../index.php' class='text-dark fw-bold'>Explore Products</a></p>";                                
                                } else {
                                    echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count_query</span> pending orders</h2>
                                    <p class='text-center'><a href='profile.php?my_orders' class='text-dark fw-bold'>Order Details</a></p>";
                                }
                            } else {
                                echo "Error: " . mysqli_error($connect); // Display error if query fails
                            }
                        }
                    }
                }
            }
        }
        ?>
        </body>
        </html>
        