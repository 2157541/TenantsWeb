<?php
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'webtechlecture');

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}
	// log user out if logout button clicked
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// variable declaration
	$roomNumber = "";
	$message    = "";
	$errors   = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$roomNumber    =  e($_POST['roomNumber']);
		$message       =  e($_POST['message']);

		// form validation: ensure that the form is correctly filled
		if (empty($roomNumber)) {
			array_push($errors, "Room Number is required");
		}
		if (empty($message)) {
			array_push($errors, "Message is required");
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {


				$query = "INSERT INTO tenant_request (roomNumber, message)
						  VALUES('$roomNumber', '$message')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM tenant_accounts WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {

			$query = "SELECT * FROM tenant_accounts WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'tenant') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Request sent successfully";
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//prevent unregistered user to access the page
	function isTenant(){
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'tenant' ) {
			return true;
		}else{
			return false;
		}
	}

	function isPersonel(){
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'personel' ) {
			return true;
		}else{
			return false;
		}
	}


	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>
