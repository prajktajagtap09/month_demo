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

$id = $_GET['id'] ?? '';

if (isset($id) && is_numeric($id)) {
    $sql = "SELECT * FROM may2024 WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    // Calculate the day of the month from the date
    $day = date('j', strtotime($date));
    $table_name = strtolower(date("F", mktime(0, 0, 0, $month, 1))) . $year;

    // Update the status of the selected day
    $sql = "UPDATE $table_name SET name = '$name', `day$day` = '$status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Recalculate present, absent, and holiday counts
        $sql = "SELECT * FROM $table_name WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $absent = 0;
        $present = 0;
        $holiday = 0;

        for ($i = 1; $i <= 31; $i++) {
            if ($row["day$i"] == 'Present') {
                $present++;
            } elseif ($row["day$i"] == 'Absent') {
                $absent++;
            } elseif ($row["day$i"] == 'Holiday') {
                $holiday++;
            }
        }

        // Update the absent, present, and holiday counts
        $sql = "UPDATE $table_name SET absent = $absent, present = $present, holiday = $holiday WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Record</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="month">Select Month:</label>
            <select id="month" name="month" required onchange="fetchNames()">
                <option value="">Select Month</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $month_name = date("F", mktime(0, 0, 0, $i, 1));
                    echo "<option value='$i'" . ($i == date('n', strtotime($row['date'])) ? ' selected' : '') . ">$month_name</option>";
                }
                ?>
            </select>

            <label for="year">Select Year:</label>
            <select id="year" name="year" required onchange="fetchNames()">
                <option value="">Select Year</option>
                <?php
                for ($year = 2023; $year <= date("Y"); $year++) {
                    echo "<option value='$year'" . ($year == date('Y', strtotime($row['date'])) ? ' selected' : '') . ">$year</option>";
                }
                ?>
            </select>

            <label for="name">Name:</label><br>
            <select id="name" name="name">
                <!-- Options will be populated by JavaScript -->
            </select><br><br>

            <label for="status">Status:</label><br>
            <select name="status">
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Holiday">Holiday</option>
            </select>
            <br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function fetchNames() {
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;

            if (month && year) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `fetch_names.php?month=${month}&year=${year}`, true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        const names = JSON.parse(this.responseText);
                        let options = '<option value="">Select Name</option>';
                        names.forEach(name => {
                            options += `<option value="${name}">${name}</option>`;
                        });
                        document.getElementById('name').innerHTML = options;
                    }
                }
                xhr.send();
            }
        }
    </script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
