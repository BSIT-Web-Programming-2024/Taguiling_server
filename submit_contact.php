<?php
// Database connection settings
$servername = "localhost";  // Database server, typically 'localhost'
$username = "root";         // MySQL username
$password = "";             // MySQL password (empty if no password)
$dbname = "contact_system";   // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind SQL query to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute query
    if ($stmt->execute()) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>