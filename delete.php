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

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete record from the specified table
    $table_name = $_POST['table_name']; // Assuming you pass the table name from the form
    $sql = "DELETE FROM $table_name WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully"; // Set message if deletion is successful
        // Redirect to index.php after successful deletion
        header("Location: index.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        $message = "Error deleting record: " . $conn->error; // Set error message if deletion fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
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
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Record</h2>
        <form method="post">
            <label for="id">Enter ID of the record to delete:</label>
            <input type="text" id="id" name="id" required>
            
            <label for="table_name">Enter Table Name:</label>
            <input type="text" id="table_name" name="table_name" required>
            
            <input type="submit" value="Delete Record">
        </form>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p> <!-- Display the message -->
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
