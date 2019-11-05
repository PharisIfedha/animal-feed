<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<!DOCTYPE html>
<html>
  <style>
    .row{
      background-color: aqua;
    }
  </style>
<head>
  <meta charset="utf-8">
  <title>Reset password</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        
          <h2 class="text-center">Password reset</h2>
          <hr>
          <p>An email will be sent to you with instructions on how to reset your password.</p>
          <form action="reset-request.php" method="POST">
          <input type="text" name="email" placeholder="enter your email address....">
          <button type="SUBMIT" name="reset-request-submit">Receive new password by email.</button>
        </form>
        <?php
        if(isset($_GET["reset"])) {
          if($_GET["reset"]== "success"){
            echo '<p class="signupsuccess">check your e-mail account!</p>';
          }
        }
        ?>
      </div> 
    </div>
  </div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>