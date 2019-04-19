
<?php
/* ---------------------------------------------------------------------------
 * filename    : login.php
 * author      : George Corser, gcorser@gmail.com
 * description : This program logs the user in by setting $_SESSION variables
 * ---------------------------------------------------------------------------
 */
// Start or resume session, and create: $_SESSION[] array
session_start(); 
include '/home/gpcorser/public_html/database/database.php';
include '/home/gpcorser/public_html/database/header.php';


if (!empty($_POST)) { // if $_POST filled then process the form
if (!strcmp($_POST['username'],'a') && !strcmp($_POST['password'], 'a')){
	$_SESSION['cust_id']=1;	
	header("Location: index.php");
}else{
	if (!strcmp($_POST['username'],'a'){$username_error = "invalid username");}
	elseif (!strcmp($_POST['password'],'a'){$password_error = "invalid password");}
}
}
	/*
	$username = $_POST['username']; // username is email address
	$password = $_POST['password'];
	$passwordhash = MD5($password);
	// echo $password . " " . $passwordhash; exit();
	// robot 87b7cb79481f317bde90c116cf36084b
		
	// verify the username/password
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM fr_persons WHERE email = ? AND password = ? LIMIT 1";
	$q = $pdo->prepare($sql);
	$q->execute(array($username,$passwordhash));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	
	if($data) { // if successful login set session variables
		echo "success!";
		$_SESSION['fr_person_id'] = $data['id'];
		$sessionid = $data['id'];
		$_SESSION['fr_person_title'] = $data['title'];
		Database::disconnect();
		header("Location: fr_assignments.php?id=$sessionid ");
		// javascript below is necessary for system to work on github
		echo "<script type='text/javascript'> document.location = 'fr_assignments.php'; </script>";
		exit();
	}
	else { // otherwise go to login error page
		Database::disconnect();
		header("Location: login_error.html");
	}
	*/
//} 
// if $_POST NOT filled then display login form, below.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

		<div class="span10 offset1">
		

			
			<!--
			<div class="row">
				<br />
				<p style="color: red;">System temporarily unavailable.</p>
			</div>
			-->

			<div class="row">
				<h3>Volunteer Login</h3>
			</div>

			<form class="form-horizontal" action="login.php" method="post">
								  
				<div class="control-group">
					<label class="control-label">Username (Email)</label>
					<div class="controls">
						<input name="username" type="text"  placeholder="me@email.com" required> 
						<?php echo $username_error?>
					</div>	
				</div> 
				
				<div class="control-group">
					<label class="control-label">Password</label>
					<div class="controls">
						<input name="password" type="password" placeholder="not your SVSU password, please" required> 
						<?php echo $password_error?>
					</div>	
				</div> 

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Sign in</button>
					&nbsp; &nbsp;
					<a class="btn btn-primary" href="fr_per_create2.php">Join (New Volunteer)</a>
				</div>
				

				
				<footer>
					<small>&copy; Copyright 2017, George Corser
					</small>
				</footer>
				
			</form>


		</div> <!-- end div: class="span10 offset1" -->
				
    </div> <!-- end div: class="container" -->

  </body>
  
</html>