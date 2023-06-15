<?php      
session_start();
    include('loginconfig.php');  

    $MobileNumber = $_POST['MobileNumber'];  
    $Password = $_POST['Password'];  
      
        //to prevent from mysqli injection  
        $MobileNumber = stripcslashes($MobileNumber);  
        $Password = stripcslashes($Password);  
        $MobileNumber = mysqli_real_escape_string($con, $MobileNumber);  
        $Password = mysqli_real_escape_string($con, $Password);  
      
        $sql = "select * from users where MobileNumber = '$MobileNumber' and Password = '$Password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            // $_SESSION['status']="<h1><center>Login Successfull</center></h1>";
            $_SESSION['logged_in']=true;
            header("Location: http://localhost/onlinefood-order/account.php");
            exit(); 
        }  
        else{  
            $_SESSION['status']="<p><center>*Invalid Login*</center></p>";
            header("Location: http://localhost/onlinefood-order/login.php");
            
        }     

?>