<?php 
function db()
{ 
	$conn = new mysqli("localhost", "root", "", "app_vlasta");  
	return $conn;
}

?>