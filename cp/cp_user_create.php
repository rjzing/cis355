<?php 
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_user_create.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program creates a new user in the cp_users database table
 * date        : 04/18/2018
 * -----------------------------------------------------------------------------------------------------------
 */
require 'database.php';
	if ( !empty($_POST)) {
		$userusernameError = null;
		$passwordError = null;
		$username = $_POST['username'];
		$password = $_POST['password'];		
		$passwordhash = MD5($password);
		$valid = true;
			if (empty($username)) {
				$userusernameError = 'Please enter a username';
				$valid = false;
			}
				if (empty($password)) {
					$passwordError = 'Please enter a password';
					$valid = false;
				}         
					if ($valid) {		
						$pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO cp_users (username, password) values(?, ?)";
						$q = $pdo->prepare($sql);
						$q->execute(array($username, $passwordhash));
						Database::disconnect();
						header("Location: index.php");
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
		<title>CP Create User</title>
	<body>
		<div class="container">
			<div class="row">
			<h3 class = "white">Create a New User</h3>
			</div>
			<form class="form-horizontal" action="cp_user_create.php" method="post">
				<div class="control-group <?php echo !empty($userusernameError)?'error':'';?>">
					<label class="white">Username</label>
					<div class="controls">
						<input required name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
						<?php if (!empty($userusernameError)): ?><span class="help-inline"><?php echo $userusernameError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<br>
				<div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
					<label class="white">Password</label>
						<div class="controls">
							<input required name="password" type="password" placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
							<?php if (!empty($passwordError)): ?><span class="help-inline"><?php echo $passwordError;?></span>
							<?php endif; ?>
						</div>
				</div>
				<br>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Submit</button>
					<a class="btn btn-danger" href="index.php">Back</a>
				</div>
			</form>
		</div>
			<div class = "footer">
				<span class = "white">&copy; rjzinger</span>
			</div>
	</body>
</html>