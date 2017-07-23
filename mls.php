<?php
error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );

$array = explode ( "\n", $_POST ['textarea'] );
$line = array ();
for($i = 0; $i < sizeof ( $array ); $i ++) {
	preg_match ( '/[A-Z][a-z]+(\s[A-Z][a-z]+)?\s\$((\d{1,3},){1,2})(\d{3}\s)/', $array [$i], $matches );
	$line [] = $matches [0];
}

$city = array();
$price = array();
for($i = 0; $i < sizeof ( $line ); $i ++) {
	$value = explode("$", $line[$i]);
    $city[] = $value[0]; 
    $price[] = $value[1];
}

$date = date("m-Y",mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']));

array_unshift($city, ' ');
array_unshift($price,$date);

$filename = "singleDetachdHouse.txt";
$filehandle = fopen($filename,"a");
if (filesize($filename) == 0)
	fputcsv($filehandle,$city);
fputcsv($filehandle,$price);	
fclose($filehandle);


?>
