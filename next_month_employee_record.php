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

$message = "";

// Display confirmation dialog for adding previous month's record to next month
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    $confirm = $_POST['confirm'];

    if ($confirm == "yes") {
        // Check if month and year are set
        if (isset($_POST['month']) && isset($_POST['year'])) {
            $next_month = $_POST['month'];
            $next_year = $_POST['year'];

            $next_table_name = strtolower(date("F", mktime(0, 0, 0, $next_month, 1))) . $next_year;

            // Check if next month's table already exists
            $check_next_sql = "SHOW TABLES LIKE '$next_table_name'";
            $check_next_result = $conn->query($check_next_sql);

            if ($check_next_result->num_rows > 0) {
                $message = "$next_table_name months table already exists.";
            } else {
                // Check if previous month's data exists
                $prev_month = date('m', strtotime('-1 month', mktime(0, 0, 0, $next_month, 1, $next_year)));
                $prev_year = date('Y', strtotime('-1 month', mktime(0, 0, 0, $next_month, 1, $next_year)));
                $prev_table_name = strtolower(date("F", mktime(0, 0, 0, $prev_month, 1))) . $prev_year;

                $check_prev_sql = "SHOW TABLES LIKE '$prev_table_name'";
                $check_prev_result = $conn->query($check_prev_sql);

                if ($check_prev_result->num_rows > 0) {
                    // Create next month's table
                    $create_next_sql = "CREATE TABLE IF NOT EXISTS $next_table_name LIKE $prev_table_name";
                    if ($conn->query($create_next_sql) === TRUE) {
                        // Copy previous month's data to next month's table
                        $copy_data_sql = "INSERT INTO $next_table_name SELECT * FROM $prev_table_name";
                        if ($conn->query($copy_data_sql) === TRUE) {
                            $message = "Records successfully copied to $next_table_name.";
                        } else {
                            $message = "Error copying records: " . $conn->error;
                        }
                    } else {
                        $message = "Error creating table: " . $conn->error;
                    }
                } else {
                    $message = "No previous month's data found in the database.";
                }
            }
        } else {
            $message = "Month and Year not selected.";
        }
    } else {
        $message = "No records were added to the next month.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Next Month Employee Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK');/* Change 'your-background-image.jpg' to your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
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
        .form-container input[type="submit"],
        .form-container button {
            margin-top: 5px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"],
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover,
        .form-container button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Next Month Employee Record</h2>

    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="confirm" value="yes">
        <label for="month">Select Month:</label>
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

        <label for="year">Select Year:</label>
        <select id="year" name="year">
            <?php
            $current_year = date('Y');
            for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <input type="submit" value="Select Month to Add Employee Record" onclick="return confirm('Do you want to add previous month Attendance record table to Next month as its database?')">
        <button type="button" onclick="window.location.href='index.php'">Back</button>
    </form>
</div>

</body>
</html>
