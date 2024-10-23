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

// Initialize variables
$selected_month = isset($_POST['month']) ? (int)$_POST['month'] : date('n'); // Default to current month
$selected_year = isset($_POST['year']) ? (int)$_POST['year'] : date('Y'); // Default to current year
$table_name = strtolower(date("F", mktime(0, 0, 0, $selected_month, 1))) . $selected_year;
$result = false;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the table exists
    $check_table_sql = "SHOW TABLES LIKE '$table_name'";
    $table_exists = $conn->query($check_table_sql);

    if ($table_exists->num_rows > 0) {
        // Update database for selected day
        $selected_day = isset($_POST['num_days']) ? (int)$_POST['num_days'] : 0;
        $day_column = "day" . $selected_day;
        $update_sql = "UPDATE $table_name SET $day_column = 'nil'";
        $conn->query($update_sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Empty Days</title>
    <style>
        body {
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK'); /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th, td {
            background-color: #f2f2f2;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .form-container select {
            padding: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h2>Empty Days</h2>

<div class="form-container">
    <form action="empty_days.php" method="post">
        <label for="month">Select Month:</label>
        <select id="month" name="month" required>
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $month_name = date("F", mktime(0, 0, 0, $i, 1));
                echo "<option value='$i'" . ($i == $selected_month ? ' selected' : '') . ">$month_name</option>";
            }
            ?>
        </select>

        <label for="year">Select Year:</label>
        <select id="year" name="year" required>
            <?php
            for ($year = 2023; $year <= date("Y"); $year++) {
                echo "<option value='$year'" . ($year == $selected_year ? ' selected' : '') . ">$year</option>";
            }
            ?>
        </select>

        <label for="num_days">Select Day:</label>
        <select id="num_days" name="num_days" required>
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <input type="submit" value="Submit" class="btn">
    </form>
</div>

<form action="index.php" method="get">
    <input type="submit" value="Back to Main Page" class="btn">
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
