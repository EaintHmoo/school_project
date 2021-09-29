<?php require_once 'controller/authController.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Register</title>
        <link rel="stylesheet" href="signupstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
      <div class="container">
          <div class="row">
              <div class="col-md-4 offset-md-4 form-div mt-5">
                  <form action="signup.php" method="post">
                      <h3 class="text-center">
                        Register
                      </h3>

                       <?php if(count($errors)>0):?>
                      
                        <div class="alert alert-danger">
                        <?php foreach($errors as $error):?>
                        <li><?php echo $error;?></li>
                        <?php endforeach;?>
                        </div>

                        <?php endif;?>
                      
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $email;?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passowrd">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passowrdConf">Confirm Password</label>
                            <input type="password" name="passwordConf" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="signup-btn" class="form-control btn btn-primary mt-3 btn-lg">Sign up</button>
                        </div>
                        <p class="text-center">Already a member? <a href="login.php">Sign in</a> </p>
                  </form>
              </div>
          </div>
      </div>             
   </body>
</html>