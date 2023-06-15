<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="signup.css">
  <title>KhajaGhar</title>
  <script >
    function validateForm() {
    //collect form data in JavaScript variables
    var pw1 = document.getElementById("pswd1").value;
    var pw2 = document.getElementById("pswd2").value;
  
    //check empty password field
    if(pw1 == "") {
      document.getElementById("message1").innerHTML = "**Fill the password please!";
      return false;
    }
  
    //check empty confirm password field
    if(pw2 == "") {
      document.getElementById("message2").innerHTML = "**Enter the password please!";
      return false;
    } 
   
    //minimum password length validation
    if(pw1.length < 8) {
      document.getElementById("message1").innerHTML = "**Password length must be atleast 8 characters";
      return false;
    }

    //maximum length of password validation
    if(pw1.length > 15) {
      document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";
      return false;
    }
  
    if(pw1 != pw2) {
      document.getElementById("message2").innerHTML = "**Passwords are not same";
      return false;
    } 
    // else {
    //   alert ("Account created successfully");
    //   document.write("JavaScript form has been submitted successfully");
    // }
 }
  </script>
</head>
<body style="background-image: url(images/bg.jpg);
             background-attachment: fixed; 
             background-size: cover; 
             font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">

  <header>
    <a href="index.html"><img id="logo" src="images/logo1.png"></a>
  </header>
  <div class="container">

    <form method="post" action="connect.php" name="users" onsubmit="return validateForm()">
      <h3 style="text-align: center;">Signup for KhajaGhar</h3>
      
    <div>
    <label>Name:</label>
    <input type="text" placeholder="Your Name" name="Name" required >
    <span class="error_message" id="err_Name"></span>
    </div>

    <div>
    <label>Password:</label>
    <input type="password" placeholder="Enter Password" name="Password" id="pswd1" required 
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
    <span id = "message1" style="color:red"> </span> <br><br>
    </div>

    <div>   
    <label>Confirm Password:</label>
    <input type="password" placeholder="Confirm Password" name="ConfirmPassword" id="pswd2" required >
    <span id = "message2" style="color:red"> </span> <br><br>
    </div>

    <div>
    <label>Mobile Number:</label>
    <input type="text" placeholder="98XXXXXXXX" name="MobileNumber" required pattern="98[0-9]{8}" >
    <span class="error_message" id="err_MobileNumber" ></span>
    </div>

    <div>
    <input type="checkbox" name = "term" >Please Agree to all the <a href="">Terms & Conditions</a>
    <span id="err_term" class="error_message"></span>
    <button type="submit" value="Submit" name="submit"> Signup</a></button>
    </div> 

    <p style="text-align:center;">
      Already have an account? <a href="login.php">Log in</a>.
    </p>
   
  </div>

</form>
</body>

</html>
