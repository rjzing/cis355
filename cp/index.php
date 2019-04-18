<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : index.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program is the landing page of the component picker system, the login program
 * date        : 04/18/2018
 * -----------------------------------------------------------------------------------------------------------
 */
session_start();
session_destroy();
require 'database.php';
	if ( !empty($_POST)) { 
		session_start(); 
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$passwordhash = MD5($password);
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM cp_users WHERE username = ? AND password = ? LIMIT 1";
		$q = $pdo->prepare($sql);
		$q->execute(array($username,$passwordhash));
		$data = $q->fetch(PDO::FETCH_ASSOC);
			if($data) {
				$_SESSION['username']=$data['username'];	
				header("Location: cp_persons.php");		
				Database::disconnect();
			}
				else {
					session_destroy();
					Database::disconnect();
					header("Location: login_error.html");
				}
	} 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="cp_css.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
		<title>CP Login</title>
			<body>
				<div class="container">
					<div class="span10 offset1">
						<div class="row">
							<h3 class = "white">Component Picker Login</h3>
						</div>
							<form class="form-horizontal" action="index.php" method="post">			
								<div class="control-group">
									<span class = "white"><label class="control-label">Username</label></span>
									<div class="controls">
										<input name="username" type="text"  placeholder="Username" required> 
									</div>	
								</div>
								<br>
									<div class="control-group">
										<span class = "white"><label class="control-label">Password</label></span>
										<div class="controls">
											<input name="password" type="password" placeholder="Password" required> 
										</div>	
									</div> 
									<br>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Sign in</button>
										<a class="btn btn-warning" href="cp_user_create.php">Register</a>					
									</div>
							</form>
					</div>			
				</div> 
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
			</body>
</html>			