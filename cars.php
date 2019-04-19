<?php

$cars = array
(
array("Volvo",18,22),
array("BMW",15,13),
array("Saab",5,2),
array("Land Rover",17,15)
);

    foreach($cars as $key => $value) {
		if ($value[1] > $value[2]){
		echo $value[0];
		echo "<br>";
		}
		else{
		}
		
    }
?>
