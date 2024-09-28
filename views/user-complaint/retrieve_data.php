<?php
// retrieve-data.php

// Retrieve the selected value from the AJAX request
$selectedValue = $_POST['selectedValue'];


// Perform a database query based on the selected value
// Assuming you have a table named 'contractors' with columns 'id', 'name', 'email', and 'phone'
// Replace with your own database structure and query logic
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the database query
$sql = "SELECT * FROM engdetails WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedEngineer);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the retrieved data
$data = $result->fetch_assoc();

// Format the data as needed
$output = "Name: " . $data['name'] . "<br>";
$output .= "Work: " . $data['work'] . "<br>";
// $output .= "Phone: " . $data['phone'] . "<br>";
print_r($data['work']);
die();
// Close the database connection
$stmt->close();
$conn->close();

// Send the formatted data as the response
return $data['work'];
?>
