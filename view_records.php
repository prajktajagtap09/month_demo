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
$name = '';
$start_date = '';
$end_date = '';
$selected_month = '';
$selected_year = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $selected_month = $_POST['month'];
    $selected_year = $_POST['year'];
    $table_name = strtolower(date("F", mktime(0, 0, 0, $selected_month, 1))) . $selected_year;

    // Construct SQL query based on form data
    $sql = "SELECT id, name, absent, present, holiday, ";

    // Append all day columns to the select statement
    for ($i = 1; $i <= 31; $i++) {
        $sql .= "day$i, ";
    }
    // Remove the trailing comma and space
    $sql = rtrim($sql, ", ") . " FROM $table_name WHERE 1=1"; // Select all records by default

    if (!empty($name)) {
        $sql .= " AND name = '$name'";
    }

    if (!empty($start_date) && !empty($end_date)) {
        $start_day = date('j', strtotime($start_date));
        $end_day = date('j', strtotime($end_date));
        $sql .= " AND (";

        for ($i = $start_day; $i <= $end_day; $i++) {
            $sql .= "day$i != '' OR ";
        }

        $sql = rtrim($sql, " OR ") . ")";
    }

    // Execute SQL query and check for errors
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK'); /* Change 'your-background-image.jpg' to your image path */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        select, input[type="date"], input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
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
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-container a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-container a:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function printRecords() {
            window.print();
        }
    </script>
</head>
<body>

<div class="container">
    <h2>View Records</h2>

    <div class="btn-container">
        <a href="javascript:history.back()">Back</a>
        <a href="logout.php">Logout</a>
    </div>

    <form action="view_records.php" method="post">
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

        <label for="name">Select Name:</label>
        <select id="name" name="name">
            <option value="">Select Name</option>
            <?php
            if (!empty($selected_month) && !empty($selected_year)) {
                $table_name = strtolower(date("F", mktime(0, 0, 0, $selected_month, 1))) . $selected_year;
                // Fetch distinct names from the selected table
                $sql_name = "SELECT DISTINCT name FROM $table_name";
                $result_name = $conn->query($sql_name);

                if ($result_name->num_rows > 0) {
                    while ($row_name = $result_name->fetch_assoc()) {
                        echo "<option value='" . $row_name["name"] . "'>" . $row_name["name"] . "</option>";
                    }
                }
            }
            ?>
        </select>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($start_date); ?>">

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($end_date); ?>">

        <input type="submit" value="View Records" class="btn">
        <button type="button" onclick="printRecords()" class="btn">Print</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $result !== false) {
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Dates</th><th>Present</th><th>Absent</th><th>Holiday</th></tr>";

            // Process date range to extract specific days
            $days_to_show = [];
            if (!empty($start_date) && !empty($end_date)) {
                $start_day = date('j', strtotime($start_date));
                $end_day = date('j', strtotime($end_date));
                for ($day = $start_day; $day <= $end_day; $day++) {
                    $days_to_show[] = $day;
                }
            }

            // Track displayed names to avoid repetition
            $displayed_names = [];

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                if (in_array($row["name"], $displayed_names)) {
                    continue; // Skip if the name has already been displayed
                }
                $displayed_names[] = $row["name"];

                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";

                // Collect dates, present, absent, and holiday
                $dates = [];
                $present = $row["present"];
                $absent = $row["absent"];
                $holiday = $row["holiday"];
                foreach ($days_to_show as $day) {
                    $dates[] = "Day $day";
                }

                echo "<td>" . implode(", ", $dates) . "</td>";
                echo "<td>" . $present . "</td>";
                echo "<td>" . $absent . "</td>";
                echo "<td>" . $holiday . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No records found";
        }

        // Close result set
        $result->free();
    }
    ?>
</div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
