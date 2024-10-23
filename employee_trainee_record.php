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
$selected_month = '';
$selected_year = '';
$table_name = '';
$result = false;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_month = $_POST['month'];
    $selected_year = $_POST['year'];
    $table_name = strtolower(date("F", mktime(0, 0, 0, $selected_month, 1))) . $selected_year;

    // Check if the table exists
    $check_table_sql = "SHOW TABLES LIKE '$table_name'";
    $table_exists = $conn->query($check_table_sql);

    if ($table_exists->num_rows > 0) {
        // Fetch records
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql = "SELECT * FROM $table_name WHERE id = '$id' AND name = '$name'";
        $result = $conn->query($sql);
    }
}

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>WELCOME</title>
    <style>
        body {
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 800px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            background-color: #4caf50;
            color: white;
        }
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .form-container select, .form-container input[type="text"] {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .logout-link {
            color: white; 
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        <p>Hello, <?php echo htmlspecialchars($username); ?>. Welcome to your dashboard!</p>
        <p><a href="logout.php" class="logout-link">Logout</a></p>

        <h2> Employee/Trainee Attendance Records</h2>
        <div class="form-container">
            <form action="employee_trainee_record.php" method="post">
                <label for="month">Select Month:</label>
                <select id="month" name="month" required>
                    <option value="">Select Month</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $month_name = date("F", mktime(0, 0, 0, $i, 1));
                        echo "<option value='$i'" . ($i == $selected_month ? ' selected' : '') . ">$month_name</option>";
                    }
                    ?>
                </select>

                <label for="year">Select Year:</label>
                <select id="year" name="year" required>
                    <option value="">Select Year</option>
                    <?php
                    for ($year = 2023; $year <= date("Y"); $year++) {
                        echo "<option value='$year'" . ($year == $selected_year ? ' selected' : '') . ">$year</option>";
                    }
                    ?>
                </select>

                <br>
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <br>
                <input type="submit" value="View Records" class="btn">
            </form>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<h3>Records for $name in " . date("F", mktime(0, 0, 0, $selected_month, 1)) . " $selected_year:</h3>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th>";
            for ($i = 1; $i <= 31; $i++) {
                echo "<th>Day $i</th>";
            }
            echo "<th>Absent</th><th>Present</th><th>Holiday</th></tr>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                for ($i = 1; $i <= 31; $i++) {
                    $day_field = 'day' . $i;
                    if (isset($row[$day_field])) {
                        echo "<td>" . $row[$day_field] . "</td>";
                    } else {
                        echo "<td>N/A</td>";
                    }
                }
                echo "<td>" . (isset($row['absent']) ? $row['absent'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['present']) ? $row['present'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['holiday']) ? $row['holiday'] : 'N/A') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found for the selected criteria.";
        }
        ?>
    </div>
</body>
</html>
