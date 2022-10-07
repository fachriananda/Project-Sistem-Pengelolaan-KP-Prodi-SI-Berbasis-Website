<?php
include 'koneksi.php';

function getValue($field,$table,$term){
	$z = mysql_fetch_array(mysql_query("SELECT $field FROM $table WHERE $term"));
	return $z[0];
}

function getNumRows($query){
	$z = mysql_num_rows(mysql_query("$query"));
	return $z;
}
/*
function getadmin($_FILES){

$z =  mysql_fetch_array(mysql_query("SELECT $_FILES"));
return $z[1];
}*/

?>