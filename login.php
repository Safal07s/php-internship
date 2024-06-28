<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>QuickMart Login Form  </title>
    <link rel="shortcut icon" href="assets/img/logo_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/logstyle.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
   
    
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/img/log_background.png" alt="">
        <div class="text">
          <span class="text-1">Welcome Back<br>Login To Your Account.</span>
          <!-- <span class="text-1">Login To Get  <br>Exciting Offers & Deals</span> -->
        </div>
      </div>
    </div>

    
    <!-- Login Form -->
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <?php
          if (isset($_GET['error'])) {
                    echo "Login Failed!! Username or password inccorect ";
                    header("Refresh:2; URL=login.php");
                }
               
              
                ?>
            <div class="title">Login</div>
          <form action="admin/auth/login-process.php" method="POST" enctype="multipart/form-data">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
      <!-- Signup Form -->
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="admin/auth/register-process.php" method="POST" enctype="multipart/form-data">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>