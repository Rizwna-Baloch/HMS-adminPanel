

<?php

require_once('../../Database/dbconnection.php');

if (isset($_POST['first_name'])) {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $patient_age = $_POST['patient_age'];
    $gender = $_POST['gender']; 
    $address = $_POST['address'];	
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    // Use a prepared statement
    $stmt = $conn->prepare("INSERT INTO patients (first_name, last_name, username, email, password, patient_age, gender, address, country, city, state, postal_code, phone, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters (14 values total)
    $stmt->bind_param("sssssissssssss", 
        $first_name, $last_name, $username, $email, $password, $patient_age, $gender, 
        $address, $country, $city, $state, $postal_code, $phone, $status
    );

    // Execute and check for success
    if ($stmt->execute()) {
        header('Location: ../patients.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
