<?php

require_once('../../Database/dbconnection.php');

//echo "<pre>";
//print_r($_REQUEST);
//exit();

if (isset($_POST['first_name'])) {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender']; 
    $address = $_POST['address'];	
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $short_biography = $_POST['short_biography'];
    $status = $_POST['status'];



    // Build SQL string — manually quote the values
    $sql = "INSERT INTO doctors (first_name, last_name, username, email, password, date_of_birth,gender,address,country,city,state,postal_code,phone,short_biography,status) 
            VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$date_of_birth', '$gender','$address','$country','$city','$state','$postal_code','$phone','$short_biography','$status')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Doctor added successfully";
        header('Location: ../doctors.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}