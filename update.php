<?php
	include_once 'dbase.php';
	$test = $_GET["status"];
	$test2 = $_GET["webtechlab"];
	$sql = "UPDATE request_status SET status='$test' where tenant='$test2'";

	if (mysqli_query($conn, $sql)) {
      header('location: status.php');
   } else {

   }
?>
