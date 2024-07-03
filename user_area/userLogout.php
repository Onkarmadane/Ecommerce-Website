<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('User Logged out Succesfully');</script>";
echo "<script>window.open('../index.php','_self');</script>";



?> 