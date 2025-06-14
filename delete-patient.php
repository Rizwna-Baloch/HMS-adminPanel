<?php


require_once('../Database/dbconnection.php');
// Connect to the database


// Check if ID is provided in the URL
if (isset($_POST['doctor_id'])) {
    $id = $_POST['doctor_id'];

    // Delete the record
    $sql = "DELETE FROM doctors WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: doctors.php?message=Doctor has been deleted'); // Redirect to the index page
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {

     header('Location: doctors.php?error=Invalid request');
}

$conn->close();
?>