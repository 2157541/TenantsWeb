<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
  <head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
  <div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Room Number</label>
			<input type="number" name="roomNumber" value="<?php echo $roomNumber; ?>">
		</div>
		<div class="input-group">
			<label>Message</label>
			<input class="message" type="text" name="message" value="<?php echo $message; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Submit</button>
		</div>

	</form>
</body>
</html>
