<?php 
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_per_create.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program creates a new person in the cp_persons database table
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
require 'database.php';
	if ( !empty($_POST)) {
		$nameError = null;
		$emailError = null;
		$mobileError = null;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$valid = true;
			if (empty($name)) {
				$nameError = 'Please enter Name';
				$valid = false;
			}
				if (empty($email)) {
					$emailError = 'Please enter Email Address';
					$valid = false;
				}
					else if( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
						$emailError = 'Please enter a valid Email Address';
						$valid = false;
					}
						if (empty($mobile)) {
							$mobileError = 'Please enter Mobile Number';
							$valid = false;
						}         
							if ($valid) {		
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "INSERT INTO cp_persons (name, email, mobile) values(?, ?, ?)";
								$q = $pdo->prepare($sql);
								$q->execute(array($name, $email, $mobile));
								Database::disconnect();
								header("Location: cp_persons.php");
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
		<title>CP Create Person</title>
	<body>
		<div class="container">
			<div class="row">
			<h3 class = "white">Create a New Person</h3>
			</div>
			<br>
			<br>
			<form class="form-horizontal" action="cp_per_create.php" method="post">
				<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="white">Name</label>
					<div class="controls">
						<input required name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
						<?php if (!empty($nameError)): ?><span class="help-inline"><?php echo $nameError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<br>
				<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					<label class="white">Email</label>
						<div class="controls">
							<input required name="email" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
							<?php if (!empty($emailError)): ?><span class="help-inline"><?php echo $emailError;?></span>
							<?php endif; ?>
						</div>
				</div>
				<br>
					<div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
						<label class="white">Mobile (pattern: 555-555-5555)</label>
						<div class="controls">
							<input required name="mobile" type="tel" placeholder="555-555-5555" pattern = "^\d{3}-\d{3}-\d{4}$" value="<?php echo !empty($mobile)?$mobile:'';?>">
							<?php if (!empty($mobileError)):?><span class="help-inline"><?php echo $mobileError;?></span><?php endif;?>
						</div>
					</div>
					<br>
					<br>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Submit</button>
					<a class="btn btn-danger" href="cp_persons.php">Back</a>
				</div>
			</form>
		</div>
			<div class = "footer">
				<span class = "white">&copy; rjzinger</span>
			</div>
	</body>
</html>