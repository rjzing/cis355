<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_components.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program shows all of the current components in the cp_components database table 
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="cp_css.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
		<title>CP Components</title>
			<body>
				<div class="container">
					<div class="row">
						<h3 class = "white">Components List</h3>
					</div>
						<div class="row">
							<p><a href="cp_comp_create.php" class="btn btn-success">Create New Component</a></p>
								<table class="table table-striped table-bordered" style="background-color:white;">
									<thead>
										<tr>
											<th>Part</th>
											<th>Description</th>
											<th>Cost</th>
											<th>Vendor</th>
											<th>Options</th>
										</tr>
									</thead>
										<tbody>
<?php
include 'database.php';
	$pdo = Database::connect();
	$sql = 'SELECT * FROM cp_components';
		foreach ($pdo->query($sql) as $row){
			echo '<tr>';
			echo '<td>'. $row['part'] . '</td>';
			echo '<td>'. $row['description'] . '</td>';
			echo '<td>'. $row['cost'] . '</td>';
			echo '<td>'. $row['vendor'] . '</td>';
			echo '<td width=182>';
			echo '<a class="btn btn-success" href="cp_comp_update.php?partID='.$row['partID'].'">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="cp_comp_delete.php?partID='.$row['partID'].'">Delete</a>';
			echo '</td>';
			echo '</tr>';
		}
	Database::disconnect();
?>
										</tbody>
								</table>
						</div>
							<div class="form-actions">
								<a href="cp_persons.php" class="btn btn-warning">Persons List</a>
								<a href="cp_logout.php" class="btn btn-danger"><?php //session_destroy();?>Log Out</a>
							</div>
				</div> 
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
					<br>
					<br>
			</body>
</html>