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

// Function to fetch all records
function fetchAllRecords($conn) {
    $sql = "SELECT * FROM may2024";
    $result = $conn->query($sql);
    $records = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $records[] = $row;
        }
    }

    return $records;
}

// Fetch all records
$records = fetchAllRecords($conn);

// Display records
if (count($records) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Absent</th><th>Present</th></tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['id'] . "</td>";
        echo "<td>" . $record['name'] . "</td>";
        echo "<td>" . $record['absent'] . "</td>";
        echo "<td>" . $record['present'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close connection
$conn->close();
?>



