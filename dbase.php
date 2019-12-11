<?php
$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'webtechlecture';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect My SQL:' .mysql_error());
}
?>
