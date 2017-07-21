<?php
error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );
$array = explode ( "\n", $_POST ['textarea'] );
$cities = array ();
for($i = 0; $i < sizeof ( $array ); $i ++) {
	preg_match ( '/[A-Z][a-z]+(\s[A-Z][a-z]+)?\s\$((\d{1,3},){1,2})(\d{3}\s)/', $array [$i], $matches );
	$cities [] = $matches [0];
}
?>
<table>
<?php
for($i = 0; $i < sizeof ( $cities ); $i ++) {
	$cells = explode("$", $cities[$i]);
	//print $cities [$i] . '<br>';
	//print "<tr><td>".$cells[0]."</td><td>".$cells[1]."</td></tr>";
	print "<tr><td>".$cells[1]."</td></tr>";
}
?>
</table>