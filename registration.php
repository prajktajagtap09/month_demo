<?php
session_start();

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

$error = ''; // Initialize the error variable
$success = ''; // Initialize the success variable

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if the username or email already exists
    $check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_sql);
    if ($check_stmt) {
        $check_stmt->bind_param("ss", $username, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows > 0) {
            $error = "Username or Email already exists. Please choose a different username or email.";
        } else {
            // Prepare and bind the SQL statement
            $sql = "INSERT INTO users (name, email, username, password, role) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                $error = "Prepare failed: " . $conn->error;
            } else {
                $stmt->bind_param("sssss", $name, $email, $username, $password, $role);

                // Execute the statement
                if ($stmt->execute()) {
                    // Registration successful
                    $success = "Registration successful. You can now <a href='login.php'>log in</a>.";
                } else {
                    // Registration failed
                    $error = "Execute failed: " . $stmt->error;
                }
            }
        }
        $check_stmt->close();
    } else {
        $error = "Database error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .registration-container {
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency */
            padding: 40px; /* Adjusted padding for larger size */
            border-radius: 10px; /* Slightly larger border radius */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Larger shadow */
            width: 500px; /* Set fixed width for larger container */
        }
        .registration-container h2 {
            margin-bottom: 20px;
            font-size: 24px; /* Increased font size for heading */
        }
        .registration-container label {
            font-size: 16px; /* Increased font size for labels */
            color: #333;
        }
        .registration-container input[type="text"],
        .registration-container input[type="email"],
        .registration-container input[type="password"],
        .registration-container select {
            width: 100%;
            padding: 12px; /* Increased padding for inputs */
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px; /* Increased font size for inputs */
        }
        .registration-container input[type="submit"] {
            width: 100%;
            padding: 12px; /* Increased padding for button */
            background-color: #ADD8E6; /* Light blue color for button */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Increased font size for button */
        }
        .registration-container input[type="submit"]:hover {
            background-color: #87CEFA; /* Slightly darker shade of light blue */
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
        .login-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #007BFF;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="registration-container">
    <h2>Register</h2>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
            <!-- Add more roles as needed -->
        </select>
        <input type="submit" value="Register" name="register">
    </form>
    <a href="login.php" class="login-link">Already have an account? Log in here</a>
</div>

</body>
</html>
