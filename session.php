<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location:profile.php');
	exit();
}
else
{
	$email = $_SESSION['log'];
}
?>