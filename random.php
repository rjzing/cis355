<?php
$holder = 1;

for ($row = 0; $row <= 19; $row++) {
	$min = 0;
	$max = 20;
	$randCol = rand($min, $max);
  echo " ";
  for ($col = 0; $col < 20; $col++) {

	if ($col != $randCol){
		echo "-";
	} else{
	echo "*";
	}
  }
  echo "<br />";
}

//for ($arrStringLine = 0; $arrStringLine <20; $arrStringLine++){
	//$randPlace = rand($holder, $max);
	//if ($arrStringLine == 0){
	//echo "*-------------------";
	//}
	//else{
		
			//for ($place = 0; $place <20; $place++){
	//if ($place != $randPlace){
		//echo "-";
	//}
			//else{
				//echo "*";
				//$arrStringLine++;
				//$holder++;
	
	
//}
//}
	//}
	//echo "<br />";
//}


	

?>