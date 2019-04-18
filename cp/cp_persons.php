<?php
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_persons.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program is the landing page for the computer component selector system. It shows the persons
 * 				   table from the cp_persons database table. The user can create a new person, delete a person, or
 *				   update a person. It holds all the links to navigate the entire system. It allows the user to see
 * 				   a persons computer configuration, add components to that persons configuration, or remove *                 components from that configuration. I made this to keep track of the blueprint of a person  
 *                 that's planning on building or currently building their own PC; however, it can keep track of
 *                 a persons computer that is already built. They can keep track of their upgrades and always have
 *                 a running total of the price of the computer.
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
		<title>CP Persons</title>
			<body>
				<div class="container">
					<div class="row">
						<h3 class = "white">Persons List</h3>
					</div>
						<div class="row">
							<p><a href="cp_per_create.php" class="btn btn-success">Create New Person</a></p>
								<table class="table table-striped table-bordered" style="background-color:white;">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Configuration Options</th>
											<th>Person Options</th>
										</tr>
									</thead>
										<tbody>
<?php
include 'database.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM cp_persons';
	foreach ($pdo->query($sql) as $row){
		echo '<tr>';
		echo '<td>'. $row['name'] . '</td>';
		echo '<td>'. $row['email'] . '</td>';
		echo '<td>'. $row['mobile'] . '</td>';
		echo '<td width=236>';
		echo '<a class="btn btn-success" href="cp_config_current.php?perID='.$row['perID'].'">View</a>';
		echo ' ';
		echo '<a class="btn btn-success" href="cp_config_add.php?perID='.$row['perID'].'">Add</a>';
		echo ' ';
		echo '<a class="btn btn-danger" href="cp_config_remove.php?perID='.$row['perID'].'">Remove</a>';
		echo '</td><td width=182>';
		echo ' ';
		echo '<a class="btn btn-success" href="cp_per_update.php?perID='.$row['perID'].'">Update</a>';
		echo ' ';
		echo '<a class="btn btn-danger" href="cp_per_delete.php?perID='.$row['perID'].'">Delete</a>';
		echo '</td>';
		echo '</tr>';
	}
Database::disconnect();
?>
										</tbody>
							</table>
						</div>
							<div class="form-actions">
								<a href="cp_components.php" class="btn btn-warning">Components List</a>
								<a href="cp_logout.php" class="btn btn-danger">Log Out</a>
							</div>

				</div>
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
					<br>
					<br>
			</body>
</html>