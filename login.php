<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Data Adventurers </title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/custom.min.css" rel="stylesheet">
</head>
<br>
<br>
<br>



<body class="login">
	<div class="col-lg-12 text-center ">
	    <img src="img/logo.png" height="100px" width="280px">
	</div>
	<br>
	<div class="login_wrapper">

	<section class="login_content">
		<form name="form1" method="post" action="login.php" method="post">
			<h1>Login</h1>

			<?php echo display_error(); ?>

			<div class="input-group">
				<input type="text" name="username" class="form-control" placeholder="ID Number" required=""/>
			</div>

			<div class="input-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required=""/>
			</div>

			<div class="d-flex justify-content-center">
				<button class="btn btn-primary submit " type="submit" name="login_btn" value="Login">Login</button>
			</div>

			<div class="clearfix"></div>

			<div class="separator">
					<p class="change_link">Doesn't have an account?
							<a href="/9404b-finals-group01/client-modules/user-registration.php"> Create Account </a>
					</p>
					<div class="clearfix"></div>
					<br/>
			</div>
		</form>
	</section>
</div>
</body>
</html>
