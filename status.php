<?php
include_once 'dbase.php';
$result = mysqli_query($conn, "SELECT tenant_accounts.firstname, tenant_accounts.lastName,tenant_accounts.roomNumber, tenant_request.message from tenant_accounts INNER JOIN tenant_request ON tenant_accounts.roomNumber = tenant_request.roomNumber;");
?>

<!DOCTYPE html>
<html>
<head>
<title>Tenant Request</title>
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

<h1>Request Status</h1>

    <?php
    if (mysqli_num_rows($result) > 0){
    ?>
    <table style="width: 100%">
    <tr>
        <th>First Name</th>
		<th>Last Name</th>
        <th>Room Number</th>
		<th>Message</th>
    </tr>
	<?php
        $i=0;
        while($row = mysqli_fetch_array($result)){
    ?>
	<form action="update.php">

    <tr>
		<td><?php echo $row["firstname"];?></input></td>
		<td><?php echo $row['lastName'];?></td>
		<td><?php echo $row["roomNumber"]; ?></td>
		<td><?php echo $row["message"];?></td>

	</form>

    </tr>

	<?php
        $i++;
    }
    ?>
    </table>
    <?php
    }
    else{
        echo "No result Found";
    }
    ?>



    </body>
</html>
