<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_comp_delete.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program deletes the selected component from cp_components database table, and *					simultaneously deletes it from cp_config database table
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
require 'database.php';
	$partID = $_GET['partID'];
		if ( !empty($_POST)) { 

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM cp_components WHERE partID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($partID));
			
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM cp_config WHERE partID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($partID));
			Database::disconnect(); 
	
	header("Location: cp_components.php"); 
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
		<title>CP Delete Component</title>
			<body>
				<div class="container">
					<form class="form-horizontal" action="cp_comp_delete.php?partID=<?php echo $_GET['partID']; ?>" method="post">
					<input type="hidden" name="partID" value="<?php echo $partID;?>"/>
						<div class="span10 offset1">
							<div class="row">
								<h3 class = "white">Delete Component</h3>
							</div>
								<span class = "white"><p class="alert alert-error">Are you sure you want to delete this component?</p></span>
									<div class="form-actions">
										<button type="submit" class="btn btn-danger">Yes</button>
										<a class="btn btn-success" href="cp_components.php">No</a>
									</div>
						</div>
					</form>                 
				</div> 
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
			</body>
</html>