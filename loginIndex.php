<?php 
require_once 'controller/authController.php';

//verify the user using token
if(isset($_GET['token'])){
   $token = $_GET['token'];
   verifyUser($token);
}

//verify the user using token
if(isset($_GET['password-token'])){
   $passwordToken = $_GET['password-token'];
   resetPassword($passwordToken);
}

if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>HomePage</title>
        <link rel="stylesheet" href="signupstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
      <div class="container mt-10">
          <div class="row">
              <div class="col-md-4 offset-md-4 form-div mt-5">

              <?php if(isset($_SESSION['message'])): ?>
                 <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                     <?php 
                     echo $_SESSION['message']; 
                     unset($_SESSION['message']);
                     unset($_SESSION['alert-class']);
                     ?>
                 </div>
              <?php endif;?>

                 <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

                 <a href="loginIndex.php?logout=1" class="logout">logout</a>
                 <?php if(!$_SESSION['verified']): ?>
                 <div class="alert alert-warning d-grid gap-2">
                    Yout need to verify your account.
                    Sign in to your email account and click on the 
                    verification link we just emailed you at 
                    <strong><?php echo $_SESSION['email']; ?></strong>
                 </div>
                 <?php endif; ?>
                 <?php if($_SESSION['verified']): ?>
                  <div class="d-grid gap-2">
                  <button class="btn btn-lg btn-primary">I am verified!</button>
                  </div>
                 <?php endif; ?>
              </div>
          </div>
      </div>             
   </body>
</html>