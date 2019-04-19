<?php
function curl_get_contents($url){
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_URL,$url);
	
	$data = curl_exec($ch);
	curl_close($ch);
	
	return $data;
	
	}
$apiCall = "https://api.svsu.edu/courses?prefix=CIS&term=18/FA"; 
//$json = null;
$json = curl_get_contents($apiCall);
$obj = json_decode($json);
//echo $json;

echo '<br><br>';

var_dump($obj);

echo $obj->courses[0]->academicLevel;

echo '<br><br>';

echo '<table>';
foreach($obj->courses as $row){
	echo '<tr>';
	echo '<td>' . $row->prefix . '</td>';
	echo '<td>' . $row->courseNumber . '</td>';
	echo '<td>' . $row->title . '</td>';
	echo '<td>' . $row->academicLevel . '</td>';
	echo '</tr>';
}
echo '</table>';
?>