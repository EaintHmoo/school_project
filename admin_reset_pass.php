<?php require_once 'controller/authController2.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Reset Password</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="signupstyle.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
      <div class="container mt-10">
          <div class="row">
              <div class="mt-5 col-md-4 offset-md-4 form-div login">
                  <form action="admin_reset_pass.php" method="post">
                      <h3 class="text-center">
                        Reset your password
                      </h3>

                      <?php if(count($errors)>0):?>
                      
                      <div class="alert alert-danger">
                      <?php foreach($errors as $error):?>
                      <li><?php echo $error;?></li>
                      <?php endforeach;?>
                      </div>

                      <?php endif;?>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passowrd">Confirm Password</label>
                            <input type="password" name="passwordConf" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="reset-password-btn" class="form-control btn btn-primary mt-3 btn-lg">
                                Reset Password
                            </button>
                        </div>
                    </div>
                  </form>
              </div>
          </div>
      </div>             
   </body>
</html>