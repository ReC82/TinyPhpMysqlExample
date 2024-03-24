<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 250px;
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .user-list {
            list-style-type: none;
            padding: 0;
        }
        .user-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Add User</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Database connection parameters
    $servername = "10.0.5.20"; // Change this to your MySQL server hostname
    $username = "vagrant"; // Change this to your MySQL username
    $password = "vagrant"; // Change this to your MySQL password
    $dbname = "lab05"; // Change this to your MySQL database name

    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        // Retrieve the user's name from the form
        $name = $_POST["name"];

        // Create a connection to the MySQL database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert the user's name into the database
        $sql = "INSERT INTO users (name) VALUES ('$name')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "<p>User added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <h2>Users List</h2>
    <ul class="user-list">
        <?php
        // Create a connection to the MySQL database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve all users from the database
        $sql = "SELECT id, name FROM users";
        $result = $conn->query($sql);

        // Check if there are users in the database
        if ($result->num_rows > 0) {
            // Output data of each user
            while ($row = $result->fetch_assoc()) {
                echo "<li class='user-item'>ID: " . $row["id"] . " - Name: " . $row["name"] . "</li>";
            }
        } else {
            echo "<li>No users found</li>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </ul>
</body>
</html>
