<?php
include '/home/gpcorser/public_html/database/database.php';
		$personsArr = array();
		$count = -1;
		$id;
		$name;
		$pdo = Database::connect();
		$sql = 'SELECT * FROM qm_persons';
		
		foreach ($pdo->query($sql) as $row) {
			$count++;
		
			$id = $row['id'];
			$name = $row['fname'] .' '. $row['lname'];
			
			$personsArr[$count] = array("id" =>$id, "name" =>$name);	

		}
	
Database::disconnect();	

echo json_encode($personsArr);

?>