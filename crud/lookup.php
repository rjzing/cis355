<?php

require 'database.php';
echo"<form action = 'lookup.php' method = 'get'>";
echo "<select name = 'id'>";
$pdo = Database::connect();
$sql = "SELECT * FROM customers";

foreach ($pdo->query($sql) as $row){
	if(!strcmp($row['name'],"zing1"))
		
	echo "<option selected value='{$row['id']}' > {$row['name']} </option>";
	else
echo "<option value='{$row['id']}' > {$row['name']} </option>";
}

$pdo = Database::disconnect();
echo "</select>";
echo "<input type = 'submit' value = 'Submit'>";
echo "</form>";


?>