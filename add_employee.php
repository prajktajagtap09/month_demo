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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $month = $_POST['month']; // New
    $year = $_POST['year']; // New

    $table_name = strtolower(date("F", mktime(0, 0, 0, $month, 1))) . $year; // New

    // Check if table exists, if not create it
    $check_table = "SHOW TABLES LIKE '$table_name'";
    $table_result = $conn->query($check_table);
    if ($table_result->num_rows == 0) {
        // Create table if it does not exist
        $create_table_sql = "CREATE TABLE $table_name (
            id VARCHAR(50) NOT NULL,
            name VARCHAR(100) NOT NULL,
            absent INT DEFAULT 0,
            present INT DEFAULT 0,
            PRIMARY KEY (id)
        )";
        $conn->query($create_table_sql);
    }

    // Check if employee already exists
    $check_sql = "SELECT * FROM $table_name WHERE id = ? OR name = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $id, $name);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $message = "Employee with this ID or Name already exists.";
    } else {
        // Insert into table
        $sql = "INSERT INTO $table_name (id, name, absent, present) VALUES (?, ?, 0, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $name);

        if ($stmt->execute() === TRUE) {
            $message = "Employee added successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $check_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK'); /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container select, 
        .form-container input[type="text"], 
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
            color: red;
        }
        .back-button {
            margin-top: 10px;
            display: block;
            text-align: center;
        }
        .back-button a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 14px;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Employee</h2>
    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="month">Month:</label>
        <select id="month" name="month">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <label for="year">Year:</label>
        <select id="year" name="year">
            <?php
            $current_year = date('Y');
            $start_year = $current_year - 10; // Change this if needed
            for ($i = $start_year; $i <= $current_year; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <input type="submit" value="Add Employee">
    </form>

    <form action="next_month_employee_record.php" method="post">
        <input type="hidden" name="confirm" value="yes">
        <input type="submit" value="Add Next Month Employee Record" onclick="return confirm('Do you want to add previous month Attendance record table to Next month as its database?')">
    </form>

    <div class="back-button">
        <a href="index.php">Back to Main Page</a>
    </div>
</div>

</body>
</html>
