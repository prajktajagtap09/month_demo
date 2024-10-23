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

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

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
    $days = array();
    $absent = 0;
    $present = 0;

    for ($i = 1; $i <= 31; $i++) {
        $days[$i] = $_POST["day$i"];
        if ($_POST["day$i"] == 'absent') {
            $absent++;
        } elseif ($_POST["day$i"] == 'present') {
            $present++;
        }
    }

    $time = $_POST['time'];
    $date = $_POST['date'];

    $sql = "UPDATE may2024 SET name = '$name'";
    for ($i = 1; $i <= 31; $i++) {
        $sql .= ", day$i = '$days[$i]'";
    }
    $sql .= ", absent = $absent, present = $present, time = '$time', date = '$date' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<h2>Edit Record</h2>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br><br>
    <?php
    for ($i = 1; $i <= 31; $i++) {
        echo "<label for='day$i'>Day $i:</label><br>";
        echo "<select id='day$i' name='day$i'>";
        echo "<option value='absent' " . ($row["day$i"] == 'absent' ? 'selected' : '') . ">Absent</option>";
        echo "<option value='present' " . ($row["day$i"] == 'present' ? 'selected' : '') . ">Present</option>";
        echo "</select><br><br>";
    }
    ?>
    <label for="time">Time:</label><br>
    <input type="time" id="time" name="time" value="<?php echo $row['time']; ?>"><br><br>
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>"><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>

