<?php
	include('functions.php');

	if (!isTenant()) {
	  $_SESSION['msg'] = "You must log in first";
	  header('location: login.php');
	}

	if (isset($_GET['logout'])) {
	  session_destroy();
	  unset($_SESSION['user']);
	  header("location: login.php");
	  exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.html">Home</a></li>
  <li><a href="input.php">Request Form</a></li>
  <li><a href="status.php">Request Status</a></li>
  <li><a href="payment.php">Payment</a></li>
  <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
  		<div class="error success" >
  			<h3>
  				<?php
  				echo $_SESSION['success'];
  				unset($_SESSION['success']);
  				?>
  			</h3>
  		</div>
  	<?php endif ?>

  	<!-- logged in user information -->
  	<div class="profile_info">
  		<div>
  			<?php  if (isset($_SESSION['user'])) : ?>
  				<strong>
  					<?php
  					echo $_SESSION['user']['firstName'];
  					?>
  				</strong>

  				<small>
  					<i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
  					<br>

  					<!-- Right -->
  					<ul class="navbar-nav nav-flex-icons">
  						<li class="nav-item">
  							<a href="login.php?logout='1'" class="nav-link waves-effect" target="_blank">logout</a>
  							&nbsp;
  						</li>
  					</ul>
  				</small>

  			<?php endif ?>
  		</div>
  	</div>
  </div>
</ul>

</body>
</html>
