<?php

require_once('../../Database/dbconnection.php');

//echo "<pre>";
//print_r($_REQUEST);
//exit();

if (isset($_POST['patient_Name'])) {
    // Collect form data
    $patient_id = $_POST['PID'];
    $patient_name = $_POST['patient_Name'];
    $email = $_POST['email']; 
    $phone_number = $_POST['phone_number'];
    $appointment_date = $_POST['date'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $message = $_POST['message'];
    $status = $_POST['status'];


    // Build SQL string — manually quote the values
    $sql = "INSERT INTO appointment (id, patient_name, email, phone_number, appointment_date, department, doctor, message, status) 
            VALUES ('$patient_id', '$patient_name', '$email', '$phone_number', '$appointment_date', '$department', '$doctor', '$message', '$status')";

    // Execute the query
     if ($conn->query($sql) === TRUE) {
        echo "Appointment added successfully";
        header("Location: ../appointments.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// require_once('../../Database/dbconnection.php');

// if(isset($_POST['submit'])) {
//     // Collect form data
//     $patient_id = $_POST['PID'];
//     $patient_name = $_POST['Patient_Name'];
//     $email = $_POST['email']; 
//     $phone_number = $_POST['phone_number'];
//     $appointment_date = $_POST['date'];
//     $department = $_POST['department'];
//     $doctor = $_POST['doctor'];
//     $message = $_POST['message'];
//     $status = $_POST['status'];

//     // Use prepared statement
//     $sql = "INSERT INTO appointment 
//             (id, name, email, phone, appointment_date, department, doctor, message, status) 
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";    
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("issssssss", 
//         $patient_id, 
//         $patient_name, 
//         $email, 
//         $phone_number, 
//         $appointment_date,
//         $department,
//         $doctor,
//         $message,
//         $status
//     );

//     if ($stmt->execute()) {
//         echo "Appointment added successfully";
//         // Redirect WITHOUT any output first
//         //header('Location: ../appointment.php');
//         exit();
//     } else {
//         // Handle error safely
//         error_log("Database error: " . $stmt->error);
//         echo "Error processing your request. Please try again.";
//     }
// }

?>