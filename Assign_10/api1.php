<?php
//include '/home/gpcorser/public_html/database/header.php';
function curl_get_contents($url){
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_URL,$url);
	
	$data = curl_exec($ch);
	curl_close($ch);
	
	return $data;
	
	}
	
$apiCall = "https://csis.svsu.edu/~rjzinger/cis355/Assign_10/api2.php"; 
$json = curl_get_contents($apiCall);
$obj = json_decode($json);


//echo '<br><br>';

//var_dump($obj);
//var_dump($obj);
//echo $obj->persons[0]->id;

//echo '<br><br>';

echo '<table>';
echo '<tr><th>ID</th><th>Name</th></tr>';
foreach($obj as $row){
	
	echo '<tr>';
	echo '<td>' . $row->id . '</td>';
	echo '<td>' . $row->name . '</td>';
	//echo '<td>' . $row->title . '</td>';
	//echo '<td>' . $row->academicLevel . '</td>';
	echo '</tr>';
}
echo '</table>';
echo '<br>';

echo '<a href="https://csis.svsu.edu/~rjzinger/cis355/Assign_10/api2.php"><button>Person API</button></a>';


?>