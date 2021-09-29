<?php require_once 'controller/authController.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Login</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="signupstyle.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
      <div class="container mt-10">
          <div class="row">
              <div class="mt-5 col-md-4 offset-md-4 form-div login">
                  <form action="login.php" method="post">
                      <h3 class="text-center">
                        Login
                      </h3>

                      <?php if(count($errors)>0):?>
                      
                      <div class="alert alert-danger">
                      <?php foreach($errors as $error):?>
                      <li><?php echo $error;?></li>
                      <?php endforeach;?>
                      </div>

                      <?php endif;?>
                        <div class="form-group">
                            <label for="username">Username or Email</label>
                            <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passowrd">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="login-btn" class="form-control btn btn-primary mt-3 btn-lg">Login</button>
                        </div>
                        <p class="text-center">Not yet a member? <a href="signup.php">Sign Up</a> </p>
                        <div style="font-size:0.8rem;text-align:center;">
                        <a href="forgot_password.php">Forgot your Password</a>
                    </div>
                  </form>
              </div>
          </div>
      </div>             
   </body>
</html>