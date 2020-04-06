<?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Session.php';
Session::init();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login | Register System PHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="inc/bootstrap.min.css">
	<script src="inc/bootstrap.min.js"></script>
	<script src="inc/jquery.min.js"></script>
	<script src="inc/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Login Register System PhP & PDO</a>
				</div>
				<ul class="nav navbar-nav pull-right ">
					<li><a href="profile.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
				</ul>
			</div>
		</nav>