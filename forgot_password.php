<?php require_once 'controller/authController.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Forgot Password Page</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="signupstyle.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
      <div class="container mt-10">
          <div class="row">
              <div class="mt-5 col-md-4 offset-md-4 form-div login">
                  <form action="forgot_password.php" method="post">
                      <h3 class="text-center">
                        Recover your password
                      </h3>

                      <p>
                          Please enter your email address your used to sign up on this site 
                          and we will assist you in recovering your password.
                      </p>

                      <?php if(count($errors)>0):?>
                      
                      <div class="alert alert-danger">
                      <?php foreach($errors as $error):?>
                      <li><?php echo $error;?></li>
                      <?php endforeach;?>
                      </div>

                      <?php endif;?>
                        <div class="form-group">
                            <input type="email" name="email"class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="forgot-password-btn" class="form-control btn btn-primary mt-3 btn-lg">Recover your password</button>
                            
                        </div>
                        
                    </div>
                  </form>
              </div>
          </div>
      </div>             
   </body>
</html>