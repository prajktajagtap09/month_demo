<?php
// process_holiday.php

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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $holiday_date = $_POST['holiday_date'];
    $holiday_desc = $_POST['holiday_desc'];

    // Extract month and year from holiday date
    $holiday_month = date('m', strtotime($holiday_date));
    $holiday_year = date('Y', strtotime($holiday_date));
    $table_name = strtolower(date("F", mktime(0, 0, 0, $holiday_month, 1))) . $holiday_year;

    // Check if the table exists
    $check_table_sql = "SHOW TABLES LIKE '$table_name'";
    $table_exists = $conn->query($check_table_sql);

    if ($table_exists->num_rows > 0) {
        // Update the holiday column for the respective day in the table
        $day_column = 'day' . date('j', strtotime($holiday_date));
        $update_sql = "UPDATE $table_name SET $day_column = 'Holiday', holiday = holiday + 1 WHERE $day_column != 'Holiday'";
        
        if ($conn->query($update_sql) === TRUE) {
            // Redirect to index.php after successful update
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating records: " . $conn->error;
        }
    } else {
        echo "Table for the specified month and year does not exist.";
    }
}

$conn->close();
?>
