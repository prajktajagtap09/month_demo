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

// Add record
if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO may2024 (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to index.php after adding record
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Record</title>
</head>
<body>

<h2>Add Record</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <input type="submit" name="add" value="Add">
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
