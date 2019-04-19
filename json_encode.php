<?php

$cars = array("chevy", "toyota", "tesla");//1d array
print_r($cars);
echo '<br><br>';

//2d array
$cars = array(
    array("chevy volt", "chevy malibu", "chevy impala"),
    array("toyota camry", "toyota corralla"),
    array("ford mustang", "ford f150")
    );
print_r($cars);
echo '<br><br>';

echo json_encode($cars); //create json object
echo '<br><br>';

//json object with keys
$cars = array(
    "chevy" =>array("chevy volt", "chevy malibu", "chevy impala"),
    "toyota" =>array("toyota camry", "toyota corralla"),
    "ford" =>array("ford mustang", "ford f150")
    );
print_r($cars);
echo '<br><br>';

echo json_encode($cars);

echo '<br><br>';

//json object with qty value
$cars = array(
    "chevy" =>array("volt"=>12, "malibu"=>5, "impala"=>20),
    "toyota" =>array("camry"=>3, "corralla"=>10),
    "ford" =>array("mustang"=>13, "f150"=>7)
    );
print_r($cars);
echo '<br><br>';

echo json_encode($cars);
echo '<br><br>';


?>