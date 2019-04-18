<?php 
/* -----------------------------------------------------------------------------------------------------------
 * filename    : cp_comp_create.php
 * author      : Robert Zinger, rjzinger@svsu.edu
 * description : This program creates a new component in the cp_components database table
 * date        : 04/11/2018
 * -----------------------------------------------------------------------------------------------------------
 */
include 'session.php';
require 'database.php';
	if ( !empty($_POST)) {

        $partError = null;
		$descriptionError = null;
        $costError = null;
		$vendorError = null;
         
        $part = $_POST['part'];
		$description = $_POST['description'];
        $cost = $_POST['cost'];
		$vendor = $_POST['vendor'];

        $valid = true;
			if (empty($part)) {
				$partError = 'Please enter Part';
				$valid = false;
			}
			
				if (empty($description)) {
					$descriptionError = 'Please enter Description';
					$valid = false;
				}
				
					if (empty($cost)) {
						$costError = 'Please enter Cost';
						$valid = false;
					}         

						if (empty($vendor)) {
							$vendorError = 'Please enter vendor';
							$valid = false;
						}
         
							if ($valid) {								
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "INSERT INTO cp_components (part, description, cost, vendor) values(?, ?, ?, ?)";
								$q = $pdo->prepare($sql);
								$q->execute(array($part, $description, $cost, $vendor));
								Database::disconnect();
								header("Location: cp_components.php");
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
  		<title>CP Create Component</title>
			<body>
				<div class="container">
					<div class="row">
						<h3 class = "white">Create a Component</h3>
					</div>
					<br>
					<br>
						<form class="form-horizontal" action="cp_comp_create.php" method="post">
							<div class="control-group <?php echo !empty($partError)?'error':'';?>">
								<label class="white">Part</label>
									<div class="controls">
										<select required name = "part">
											<option value="">None</option>
											<option value ="Case">Case</option>
											<option value ="PSU">PSU</option>
											<option value ="Cooling">Cooling</option>
											<option value ="HDD">HDD</option>
											<option value ="SSD">SSD</option>
											<option value ="ROM Drive">ROM Drive</option>
											<option value ="RAM">RAM</option>
											<option value ="Motherboard">Motherboard</option>
											<option value ="Processor">Processor</option>
											<option value ="Monitor">Monitor</option>
											<option value ="GPU">GPU</option>
											<option value ="Wireless Card">Wireless Card</option>
											<option value ="Mouse">Mouse</option>
											<option value ="Keyboard">Keyboard</option>
										</select>
									</div>
							</div>
							<br>
								<div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
									<label class="white">Description</label>
										<div class="controls">
											<input required name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
											<?php if (!empty($descriptionError)): ?>
												<span class="help-inline"><?php echo $descriptionError;?></span>
											<?php endif; ?>
										</div>
								</div>
								<br>
									<div class="control-group <?php echo !empty($costError)?'error':'';?>">
										<label class="white">Cost</label>
											<div class="controls">
												<input required name="cost" type="text" placeholder="Cost" value="<?php echo !empty($cost)?$cost:'';?>">
												<?php if (!empty($costError)): ?>
													<span class="help-inline"><?php echo $costError;?></span>
												<?php endif;?>
											</div>
									</div>
									<br>
										<div class="control-group <?php echo !empty($vendorError)?'error':'';?>">
											<label class="white">Vendor</label>
											<div class="controls">
												<select required name = "vendor">
													<option value="">None</option>
													<option value ="Amazon">Amazon</option>
													<option value ="Newegg">Newegg</option>
													<option value ="MicroCenter">MicroCenter</option>
													<option value ="BestBuy">BestBuy</option>
												</select>
											</div>
										</div>
										<br>
										<br>
											<div class="form-actions">
												<button type="submit" class="btn btn-success">Submit</button>
												<a class="btn btn-danger" href="cp_components.php">Back</a>
											</div>
						</form>
				</div>
					<div class = "footer">
						<span class = "white">&copy; rjzinger</span>
					</div>
			</body>
</html>