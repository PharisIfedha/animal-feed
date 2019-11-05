<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<!DOCTYPE html>
<html>
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
        
        <?php
        $selector= $_GET["selector"];
        $validator= $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Could not validate your request";
        } else { // check if they are legit tokens
            if (ctype_xdigit($selector) !==false && ctype_xdigit($validator) !==false ) {
               ?>
               <form action="reset-request.php" method="POST">
               <input type="hidden" name="selector" value="<?php echo $selector ?>">
               <input type="hidden" name="validator" value="<?php echo $validator ?>">
               <input type="password" name="pwd" placeholder="Enter a new password...">
               <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
               <button type="submit" name="reset-password-submit">Reset password.</button>
               </form>
               <?php
            }
        }
        
        ?>
          
      </div> 
    </div>
  </div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>