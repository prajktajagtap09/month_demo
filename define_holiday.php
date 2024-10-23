<!DOCTYPE html>
<html>
<head>
    <title>Define Holiday</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSHhGQk9Dwm2KjDJr-hy4vsNUwzXCozqFkwj0wUrvieAO6Ny_dGO-T9liE5iOjK'); /* Add your background image here */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .container h2 {
            text-align: center;
        }
        .container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .container label {
            font-weight: bold;
        }
        .container input[type="date"],
        .container input[type="text"] {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-button {
            margin-top: 10px;
            padding: 10px;
            background-color: #ddd;
            color: #333;
            border: none;
            cursor: pointer;
            text-align: center;
            display: block;
            width: 100%;
            box-sizing: border-box;
            text-decoration: none;
            text-align: center;
        }
        .back-button:hover {
            background-color: #ccc;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Define Holiday</h2>

    <form method="post" action="process_holiday.php">
        <label for="holiday_date">Date:</label>
        <input type="date" id="holiday_date" name="holiday_date" required>

        <label for="holiday_desc">Description:</label>
        <input type="text" id="holiday_desc" name="holiday_desc" required>

        <input type="submit" value="Submit">
    </form>

    <button class="back-button" onclick="goBack()">Back</button>
</div>

</body>
</html>
