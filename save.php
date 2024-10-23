<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "month";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $absent = $_POST["absent"];
    $present = $_POST["present"];

    // Insert data into database
    $sql = "INSERT INTO may2024 (name, absent, present) VALUES ('$name', '$absent', '$present')";

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
