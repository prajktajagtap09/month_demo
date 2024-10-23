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
        $sql = "SELECT * FROM $table_name ORDER BY id ASC";
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
    <title>Home</title>
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
        .text-holiday {
            color: #FF0000;
        }
        .text-present {
            color: #7FFF00;
        }
        .text-absent {
            color: #FF7E00;
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
        .form-container select {
            padding: 10px;
            margin-right: 10px;
        }
        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .logout-link {
            color: black;
            text-decoration: none;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        .logout-link {
            color: white; /* Change color to white */
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

        <h2>Attendance Records</h2>
        <div class="form-container">
            <form action="index.php" method="post">
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

                <input type="submit" value="View Records" class="btn">
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>ID</th><th>Name</th>";
            for ($i = 1; $i <= 31; $i++) {
                echo "<th>Day $i</th>";
            }
            echo "<th>Absent</th><th>Present</th><th>Holiday</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    for ($i = 1; $i <= 31; $i++) {
                        $day = "day" . $i;
                        $status = $row[$day];
                        $textClass = '';
                        if ($status == 'Holiday') {
                            $textClass = 'text-holiday';
                        } elseif ($status == 'Present') {
                            $textClass = 'text-present';
                        } elseif ($status == 'Absent') {
                            $textClass = 'text-absent';
                        }
                        echo "<td class='$textClass'>" . $status . "</td>";
                    }
                    echo "<td class='text-absent'>" . $row["absent"] . "</td>";
                    echo "<td class='text-present'>" . $row["present"] . "</td>";
                    echo "<td class='text-holiday'>" . $row["holiday"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='36'>No records found for the selected month and year.</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
        ?>

        <div class="button-container">
            <form action="add_employee.php" method="get">
                <input type="submit" value="Add Employee" class="btn">
            </form>
            <form action="define_holiday.php" method="get">
                <input type="submit" value="Define Holiday" class="btn">
            </form>
            <form action="view_records.php" method="get">
                <input type="submit" value="View Records" class="btn">
            </form>
            <form action="empty_days.php" method="post">
                <input type="hidden" name="month" value="<?php echo $selected_month; ?>">
                <input type="hidden" name="year" value="<?php echo $selected_year; ?>">
                <input type="submit" value="Empty Days" class="btn">
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $result && $result->num_rows > 0) {
            echo '<div style="margin-top: 20px;">';
            echo '<button class="btn" style="margin-right: 20px;" onclick="handleEdit()">Edit Record</button>';
            echo '<button class="btn" onclick="handleDelete()">Delete Record</button>';
            echo '</div>';
        }
        ?>

        <script>
        function handleEdit() {
            var id = prompt("Enter the ID of the record you want to edit:");
            if (id) {
                var idExists = false;
                var recordIDs = document.querySelectorAll('tbody tr td:first-child');
                recordIDs.forEach(function(cell) {
                    if (cell.textContent.trim() === id) {
                        idExists = true;
                    }
                });
                
                if (idExists) {
                    window.location.href = 'edit.php?id=' + id;
                } else {
                    alert("The entered ID does not exist in the displayed records.");
                }
            }
        }

        function handleDelete() {
            var id = prompt("Enter the ID of the record you want to delete:");
            if (id) {
                var idExists = false;
                var recordIDs = document.querySelectorAll('tbody tr td:first-child');
                recordIDs.forEach(function(cell) {
                    if (cell.textContent.trim() === id) {
                        idExists = true;
                    }
                });
                
                if (idExists) {
                    window.location.href = 'delete.php?id=' + id;
                } else {
                    alert("The entered ID does not exist in the displayed records.");
                }
            }
        }
        </script>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
