<?php
include 'includes/connection.php';
session_start();

$username = $_POST['Username'];
$password = $_POST['Password'];

if ($username && $password){

$query = mysql_query("SELECT * FROM users WHERE username = '$username'");

$numrows = mysql_num_rows($query);

if ($numrows != 0){
	while ($row = mysql_fetch_array($query)){
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
	}
	if ($username == $dbusername && $password == $dbpassword){
	$_SESSION['username'] = $dbusername;
	header('Location: members/memberhome.php');

	}
	else 
		die("Username or password not found.");
}
else
	die("User not found.");

}
	else 
		die("Please enter a valid username and password");
?>