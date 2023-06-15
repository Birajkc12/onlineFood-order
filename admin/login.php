<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
        <style>
            #logo{
                 margin-left: 43.6%;
                 width: 150x;
                 height: 150px;
                }
                header{
  height: 50px;
}
button{
  background-color: #1ab020;
  width: 100%;
  color: white;
  padding: 15px;
  margin: 10px 0px;
  border: none; 
  cursor: pointer;
}
input[type=text], input[type=password], input[type=number] { 
        width: 100%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid green; 
        box-sizing: border-box; 
    }

button:hover{
  opacity: 0.5;
}
form{
  border: 3px solid #f1f1f1;
}
.container{
  padding: 20px;
  float: right;
  background-color: ghostwhite;
  width: 300px;
  margin-left: 800px;
  margin-top: 100px;
  margin-right: 200px;
}
        </style>
    </head>

    <body style="background-image: url(../images/bg.jpg);
             background-attachment: fixed; 
             background-size: cover; 
             font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
         <header>
    <a href="login.php"> <img id="logo" src="../images/logo1.png"></a>
  </header>
<br><br><br><br>
           

            <!-- Login form starts here -->
            <div class="container">
    <form method="post" action="" class="text-center" >
      <h3 style="text-align: center;">Admin Login</h3> <br>
      <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br>
    <label>Username</label>
    <input type="text" placeholder="Enter Username" name="username" >

    <label>Password</label>
    <input type="password" placeholder="Enter Password" name="password">

    <button type="submit" name="submit" value="Login">Login</button>
  </div>
            <!-- login form ends here -->


    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>