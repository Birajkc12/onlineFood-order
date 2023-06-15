<?php include('loginconfig.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="login.css">
  <title>KhajaGhar</title>
</head>
<body style="background-image: url(images/bg.jpg);
             background-attachment: fixed; 
             background-size: cover; 
             font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
  <header>
    <a href="index.php"> <img id="logo" src="images/logo1.png"></a>
  </header>



  <div class="container">
    <form method="post" action="loginconnection.php" >
      <h3 style="text-align: center;">Login to KhajaGhar</h3>

 
      
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

<?php 
  if(isset($_SESSION['status']))
  {
 ?>

 <?php 
  echo $_SESSION['status'];
?>
<?php 
   unset($_SESSION['status']);
  }
?>
<br>

    <label>Mobile Number:</label>
    <input type="number" placeholder="98XXXXXXXX" name="MobileNumber" required pattern="98[0-9]{8}">

    <label>Password:</label>
    <input type="Password" placeholder="Enter Password" name="Password" required>

    <input type="checkbox" checked="checked">Remember me 
    <button type="submit">Login</button>

    <p style="text-align:center;">
      Don't have an account? <a href="signup.php">Sign up</a>.
    </p>
    <p style="text-align:center;">  
    <a href="#">Forgot Password</a>.
    </p>
  </div>

</form>
</body>
</html>


