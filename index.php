<?php include("config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AFODS - Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="static/css/style1.css">
  <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
    <div class="container">
      <div class="nav-wrapper">
        <div class="left-side">
          <div class="brand">
            <div>Animal Feed Ordering and Delivery system</div>
          </div>
        </div>

        <div class="right-side">
          <div class="nav-link-wrapper">
            <a href="about.html">About us</a>
          </div>

          <div class="nav-link-wrapper">
            <a href="contact.html">contact us</a>
          </div>
        </div>
      </div>
    </div>
    <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
    

