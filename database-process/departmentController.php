<?php

require_once('../../Database/dbconnection.php');

//echo "<pre>";
//print_r($_REQUEST);
//exit();

if (isset($_POST['department_Name'])) {
    // Collect form data
    $department_Name = $_POST['department_Name'];
    $department_description = $_POST['department_description'];
    $status = $_POST['status'];



    // Build SQL string — manually quote the values
    $sql = "INSERT INTO departments (department_Name, department_description, status) 
            VALUES ('$department_Name', '$department_description', '$status')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Department added successfully";
        header('Location: ../departments.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}