<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_per_delete.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program deletes the selected person from cp_persons database table, and simultaneously *				   deletes that persons id from cp_config database table
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
require 'database.php';
$perID = $_GET['perID'];
	if ( !empty($_POST)) { 
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM cp_persons WHERE perID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($perID));	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM cp_config WHERE perID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($perID));
		Database::disconnect(); 
		header("Location: cp_persons.php"); 
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
		<title>CP Delete Person</title>
			<body>
				<div class="container">
					<form class="form-horizontal" action="cp_per_delete.php?perID=<?php echo $_GET['perID']; ?>" method="post">
						<input type="hidden" name="perID" value="<?php echo $perID;?>"/>
							<div class="span10 offset1">
								<div class="row">
									<h3 class = "white">Delete Person</h3>
								</div>
									<span class = "white"><p class="alert alert-error">Are you sure you want to delete this person?</p></span>
										<div class="form-actions">
											<button type="submit" class="btn btn-danger">Yes</button>
											<a class="btn btn-success" href="cp_persons.php">No</a>
										</div>
					</form>
							</div>
				</div> 
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
			</body>
</html>