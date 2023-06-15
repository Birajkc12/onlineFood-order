<?php 
    //Include constants.php for SITEURL
    // include('loginconfig.php');
    session_start();
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header("Location: http://localhost/onlinefood-order/login.php");
    //echo ' You have been logged out.';

?> 