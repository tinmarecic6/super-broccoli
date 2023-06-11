<?php
require('db.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$conn = db();
	// Retrieve the receipt ID from the form submission
	$id_racuna = $_POST["id_bill"];

	echo $id_racuna;
    $sql = "DELETE FROM bill WHERE id = '$id_racuna';";
	$conn->query($sql);
	$conn->commit();
    if ($conn->query($sql) === TRUE) {
        echo "Receipt deleted successfully.";
    } else {
        echo "Error deleting receipt: " . $conn->error;
    }

    header("Location: guest_evidention.php");
    exit;
}
