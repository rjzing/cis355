<html>

<?php
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];

$x1 = -$b + sqrt($b * $b - 4 * $a * $c);
$x1 = $x1 / (2 * $a);

$x2 = -$b - sqrt($b * $b - 4 * $a * $c);
$x2 = $x2 / (2 * $a);

echo "X1 = ".$x1 .", X2 = ".$x2; 
?>

</html>