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

$month = $_GET['month'] ?? '';
$year = $_GET['year'] ?? '';

if ($month && $year) {
    $table_name = strtolower(date("F", mktime(0, 0, 0, $month, 1))) . $year;

    $sql = "SELECT DISTINCT name FROM $table_name";
    $result = $conn->query($sql);

    $names = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $names[] = $row['name'];
        }
    }

    echo json_encode($names);
} else {
    echo json_encode([]);
}

$conn->close();
?>
