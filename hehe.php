<?php
// Database connection settings
$servername = "localhost";  // Database server
$username = "root";         // Database username (usually "root" for local dev)
$password = "";             // Database password (usually empty for local dev)
$dbname = "contact_system";     // The name of the database you created

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and process the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and capture the form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : null;
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare SQL query to insert data into the table
    $sql = "INSERT INTO contacts (Fullname, email, phonenumber, message) VALUES ('$name', '$email', '$phone', '$message')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Your message has been successfully submitted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>