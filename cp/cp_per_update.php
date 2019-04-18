<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_per_update.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program updates the selected person from the cp_persons database table
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
require 'database.php';
$perID = $_GET['perID'];
	if (!empty($_POST)) {
		$nameError = null;
		$emailError = null;
		$mobileError = null;			
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];		
		$valid = true;
			if (empty($name)) {
				$nameError = 'Please Enter Name';
				$valid = false;
			}
				if (empty($email)) {
				$emailError = 'Please Enter Email Address';
				$valid = false;
				} 
					else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
						$emailError = 'Please Enter a valid Email Address';
						$valid = false;
					}						
						if (empty($mobile)) {
							$mobileError = 'Please Enter Mobile Number';
							$valid = false;
						}
							if ($valid) {
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "UPDATE cp_persons set name = ?, email = ?, mobile = ? WHERE perID = '$perID'";
								$q = $pdo->prepare($sql);
								$q->execute(array($name, $email, $mobile));
								Database::disconnect();
								header("Location: cp_persons.php");
							}
	} 
		else{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM cp_persons WHERE perID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($perID));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			$name = $data['name'];
			$email = $data['email'];
			$mobile = $data['mobile'];
			Database::disconnect();
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
		<title>CP Update Person</title>
			<body>
				<div class="container">
					<div class="row">
						<h3 class = "white">Update Person</h3>
					</div>
					<br>
					<br>
						<form class="form-horizontal" action="cp_per_update.php?perID=<?php echo $_GET['perID']; ?>" method="post">
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
											<?php if (!empty($emailError)): ?><span class="help-inline"><?php echo$emailError;?></span>
											<?php endif; ?>
									</div>
								</div>
								<br>
									<div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
										<label class="white">Mobile (pattern: 555-555-5555)</label>
										<div class="controls">
											<input required name="mobile" type="tel" placeholder="555-555-5555" pattern = "^\d{3}-\d{3}-\d{4}$" value="<?php echo !empty($mobile)?$mobile:'';?>">
												<?php if (!empty($mobileError)): ?><span class="help-inline"><?php echo $mobileError;?></span>
												<?php endif;?>
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