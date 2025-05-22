<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO query (Name,Email,Message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Set parameters and execute the statement
$name = $_POST['t1'];
$email = $_POST['t2'];
$message = $_POST['t3'];

if ($email == '') {
    echo "Email cannot be left blank";
} else {
    if ($stmt->execute()) {
  // Close statement and connection
  $stmt->close();
  $conn->close();
  // Redirect to another page
  header("Location: index.html");
  exit; // Ensure no further execution after redirection    } else {
        echo "Error: " . $conn->error;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>