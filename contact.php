<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<html>
<head>
  <meta charset="utf-8">
  <title>AFODS - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="static/css/style1.css">
  <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
	
    <div class="row" style="color: orange;">
        <div class="col-md-6"></div>
		<div class="col-md-10 text-center">
			<form method="post" action="contact_submit.php" class="form-horizontal">
			  	<fieldset>
				    <b><legend style="font-family:Bradley Hand ITC; font-size: 70px;">Contact us</legend></b>
				    <p class="lead">We’d love to hear from you! Send us an email on <a href="https://mail.google.com/mail/u/0/#inbox/FMfcgxwDsFbCfzxwpctwBvjdwmnQcxNx">pharis.ifedha@gmail.com</a> or comment on the textbox</p>
				    <div class="form-group">
					CONTACT ME ON
  <a href="https://www.facebook.com/Animal-Feed-Ordering-and-Delivery-System-AFODS-103468967772341/?modal=admin_todo_tour&ref=admin_to_do_step_controller" class="fa fa-facebook"></a>
  <a href="https://twitter.com/" class="fa fa-twitter"></a>
  <a href="https://whatsapp.com/" class="fa fa-whatsapp"></a>
  <a href="https://instagram.com/" class="fa fa-instagram"></a>
  <a href="https://gmail.com/" class="fa fa-gmail"></a>
				      	<label for="name" class="col-lg-2 control-label">Name</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="email" class="col-lg-2 control-label">Email</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"required>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="descr" class="col-lg-2 control-label">Textarea</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="descr" name="descr" required></textarea>
				        	<span class="help-block" style="color: yellow; font-size: 30px;">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="btn btn-default">Cancel</button>
				        	<button type="submit" class="btn btn-primary">Submit</button>
				      	</div>
				    </div>
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</body>
<style>
	body{
        background-image: url(./photos/ifedha.jpg);
		background-repeat: repeat;
		font-size: 120%;
		
		fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
}


fa:hover {
  opacity: 0.7;
}


fa-facebook {
  background: white;
  color: white;
}

fa-twitter {
  background: #white;
  color: white;
}
fa-whatsapp{
  background:black;
  color: white;
}


fa-instagram {


  background: white;
  color: white;
		
    </style>
	<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>