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

$message = ''; // Variable to store messages

if (isset($_POST["check_records"])) {
    $selectedMonth = $_POST['month'];
    $selectedYear = $_POST['year'];

    // Construct the table name for the selected month and year
    $selectedTableName = strtolower(date("F", mktime(0, 0, 0, $selectedMonth, 1))) . $selectedYear;

    // Check if the table exists
    $checkTableQuery = "SHOW TABLES LIKE '$selectedTableName'";
    $tableExists = $conn->query($checkTableQuery);

    if ($tableExists->num_rows > 0) {
        // If the table exists, show the message
        $message = "Records for " . date("F Y", mktime(0, 0, 0, $selectedMonth, 1)) . " are available.";
    } else {
        // If the table does not exist, display a message indicating that the records are not present
        $message = "Records for " . date("F Y", mktime(0, 0, 0, $selectedMonth, 1)) . " are not present.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Previous Month Employee Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container select, 
        .form-container input[type="submit"] {
            margin-top: 5px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>New Month Employee Record</h2>
    <form method="post">
        <label for="month">Select Month:</label>
        <select id="month" name="month" required>
            <option value="">Select Month</option>
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $month_name = date("F", mktime(0, 0, 0, $i, 1));
                echo "<option value='$i'>$month_name</option>";
            }
            ?>
        </select>

        <label for="year">Select Year:</label>
        <select id="year" name="year" required>
            <option value="">Select Year</option>
            <?php
            $current_year = date('Y');
            $start_year = $current_year - 10; // Change this if needed
            for ($i = $start_year; $i <= $current_year; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <input type="submit" value="Check Records" name="check_records">
    </form>

    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
