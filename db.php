<?php 
function db()
{ 
	$conn = new mysqli("localhost", "root", "", "app_vlasta");  
	$conn->set_charset("utf8");
	return $conn;
}

?>