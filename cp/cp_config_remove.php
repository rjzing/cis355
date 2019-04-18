<?php 
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_config_remove.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program shows the current components a person has associated with their computer *				configuration, using the cp_config table from the database. It then allows you to delete 
 *				  components from that persons configuration	  
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */ 
include 'session.php';
require 'database.php';
	if ( !empty($_POST)){ 
		if(isset($_POST['removeFromConfig'])){
			foreach($_POST['removeFromConfig'] as $_boxValue){
				$partID = $_boxValue;
				$perID = $_GET['perID'];
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "DELETE FROM cp_config WHERE partID = '$partID'";
				$q = $pdo->prepare($sql);
				$q->execute(array($partID));
				Database::disconnect();
				header("Location: cp_persons.php"); 			
			}
		}
	}
$perID = $_GET['perID'];
$pdo = Database::connect();
$sql = 'SELECT name FROM cp_persons WHERE perID =' . $perID;
	$q = $pdo->prepare($sql);
	$q->execute(array($perID));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	$currentName = $data['name'];
Database::disconnect();	
?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="cp_css.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
		<title>CP Remove Config</title>
			<body>
				<div class="container">
					<form class="form-horizontal" action="cp_config_remove.php?perID=<?php echo $_GET['perID']; ?>" method="post">
						<input type="hidden" name="perID" value="<?php echo $perID;?>"/>
							<div class="span10 offset1">
								<div class="row">
									<h3 class = "white">Remove From <?php echo $currentName ."'s "; ?>Current Configuration</h3>
								</div>
									<table class="table table-striped table-bordered" style="background-color:white;">
										<thead>
											<tr>
												<th>Part</th>
												<th>Description</th>
												<th>Cost</th>
												<th>Vendor</th>
												<th>Remove</th>
											</tr>
										</thead>
											<tbody>
<?php
$totalCost = 0;
$pdo = Database::connect();
$sql = 'SELECT partID FROM cp_config WHERE perID=' . $perID;
	foreach ($pdo->query($sql) as $row) {
	$sql = 'SELECT partID, part, description, cost, vendor FROM cp_components WHERE partID='. $row['partID'];
		foreach ($pdo->query($sql) as $row) {
			$totalCost += $row['cost'];							
			echo '<tr>';
			echo '<td>'. $row['part'] . '</td>';
			echo '<td>'. $row['description'] . '</td>';
			echo '<td>'. $row['cost'] . '</td>';
			echo '<td>'. $row['vendor'] . '</td>';
			echo '<td width=60><input type="checkbox" name = "removeFromConfig[]" value="' . $row['partID'] . '"></td>';
			echo '</tr>';								
		}
	}
echo '</tbody></table>';
Database::disconnect();
?>
											<br>
												<span class = "white"><label class="control-label"><h5>Total Cost of <?php echo $currentName ."'s "; ?>Current Configuration:</h5></label><?php echo ' $'. $totalCost; ?></span>
													<div class="form-actions">
														<button type="submit" class="btn btn-danger">Remove</button>
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