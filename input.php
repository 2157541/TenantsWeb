<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
  <head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  table, th, td {
  	border: 1px solid black;
  	border-collapse: collapse;
  }

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
  </ul>
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
